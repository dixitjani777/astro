@once
@php($recaptchaSiteKey = config('services.recaptcha.site_key'))
@if($recaptchaSiteKey)
<script>
	(function () {
		var siteKey = @json($recaptchaSiteKey);
		if (!siteKey || window.appRecaptcha) return;

		var loadPromise = null;

		function loadScript() {
			if (loadPromise) return loadPromise;

			loadPromise = new Promise(function (resolve, reject) {
				if (window.grecaptcha && window.grecaptcha.execute) {
					resolve();
					return;
				}

				var script = document.createElement('script');
				script.src = 'https://www.google.com/recaptcha/api.js?render=' + encodeURIComponent(siteKey);
				script.async = true;
				script.defer = true;
				script.onload = function () { resolve(); };
				script.onerror = function () { reject(new Error('Unable to load reCAPTCHA.')); };
				document.head.appendChild(script);
			});

			return loadPromise;
		}

		function ensureHiddenToken(form) {
			var input = form.querySelector('input[name="recaptcha_token"]');
			if (!input) {
				input = document.createElement('input');
				input.type = 'hidden';
				input.name = 'recaptcha_token';
				form.appendChild(input);
			}
			return input;
		}

		function execute(action) {
			return loadScript().then(function () {
				return new Promise(function (resolve, reject) {
					window.grecaptcha.ready(function () {
						window.grecaptcha.execute(siteKey, { action: action || 'submit' })
							.then(resolve)
							.catch(reject);
					});
				});
			});
		}

		window.appRecaptcha = {
			enabled: true,
			siteKey: siteKey,
			execute: execute,
			fillForm: function (form, action) {
				return execute(action).then(function (token) {
					ensureHiddenToken(form).value = token;
					return token;
				});
			},
		};

		document.addEventListener('DOMContentLoaded', function () {
			Array.prototype.forEach.call(document.querySelectorAll('form[data-recaptcha-action]'), function (form) {
				if (form.dataset.recaptchaBound === '1') return;
				form.dataset.recaptchaBound = '1';

				form.addEventListener('submit', function (event) {
					if (form.dataset.recaptchaReady === '1') {
						form.dataset.recaptchaReady = '0';
						return;
					}

					event.preventDefault();

					window.appRecaptcha.fillForm(form, form.getAttribute('data-recaptcha-action'))
						.then(function () {
							form.dataset.recaptchaReady = '1';
							if (typeof form.requestSubmit === 'function') {
								form.requestSubmit();
							} else {
								form.submit();
							}
						})
						.catch(function () {
							alert('Captcha verification failed. Please try again.');
						});
				});
			});
		});
	})();
</script>
@endif
@endonce
