document.addEventListener('DOMContentLoaded', () => {
  const chatbotButton = document.getElementById('chatbot-button');
  const chatbotWindow = document.getElementById('chatbot-window');
  const chatbotClose = document.getElementById('chatbot-close');
  const chatbotMessages = document.getElementById('chatbot-messages');
  const chatbotInput = document.getElementById('chatbot-input');
  const chatbotSend = document.getElementById('chatbot-send');

  if (!chatbotButton || !chatbotWindow) return;

  const csrfEl = document.querySelector('meta[name="csrf-token"]');
  const baseUrlEl = document.querySelector('meta[name="base-url"]');
  const csrf = (csrfEl && csrfEl.getAttribute('content')) ? csrfEl.getAttribute('content') : '';
  const baseUrlMeta = (baseUrlEl && baseUrlEl.getAttribute('content')) ? baseUrlEl.getAttribute('content') : '';

  function buildEndpoint(pathname) {
    // Support apps hosted in a subdirectory (e.g. http://localhost/astro).
    // Use the server-rendered base URL when available.
    var basePath = '/';
    try {
      if (baseUrlMeta) {
        basePath = (new URL(baseUrlMeta, window.location.href)).pathname || '/';
      }
    } catch (e) {
      basePath = '/';
    }

    basePath = ('/' + String(basePath).replace(/^\/+|\/+$/g, '') + '/').replace(/\/{2,}/g, '/');
    var base = new URL(basePath, window.location.origin);
    return new URL(String(pathname).replace(/^\/+/, ''), base).toString();
  }

  const aiEndpoint = buildEndpoint('/chatbot/ai');
  const submitEndpoint = buildEndpoint('/chatbot/submit');

  function safeJsonParse(text) {
    if (!text) return {};
    const trimmed = String(text).trim();
    const objIdx = trimmed.indexOf('{');
    const arrIdx = trimmed.indexOf('[');
    const start = [objIdx, arrIdx].filter(i => i >= 0).sort((a, b) => a - b)[0];
    return JSON.parse(start != null ? trimmed.slice(start) : trimmed);
  }

  function addMessage(sender, text) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chatbot-message', sender);
    messageElement.textContent = text;
    chatbotMessages.appendChild(messageElement);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
  }

  function addOptions(options) {
    const container = document.createElement('div');
    container.style.marginTop = '10px';
    const select = document.createElement('select');
    select.className = 'form-control';
    const defaultOption = document.createElement('option');
    defaultOption.textContent = 'Select an option...';
    defaultOption.value = '';
    defaultOption.disabled = true;
    defaultOption.selected = true;
    select.appendChild(defaultOption);

    options.forEach(option => {
      const opt = document.createElement('option');
      opt.textContent = option;
      opt.value = option;
      select.appendChild(opt);
    });

    select.addEventListener('change', () => {
      const selected = select.value;
      if (!selected) return;
      addMessage('user', selected);
      container.remove();
      sendToAI(selected);
    });

    container.appendChild(select);
    chatbotMessages.appendChild(container);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
  }

  function sendToAI(message, isReset = false) {
    const body = isReset ? { reset: true } : { message };
    fetch(aiEndpoint, {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf,
      },
      body: JSON.stringify(body),
    })
      .then(async r => {
        const text = await r.text();
        let json;
        try {
          json = safeJsonParse(text);
        } catch {
          throw new Error(`Non-JSON response (${r.status}): ${String(text).slice(0, 200)}`);
        }
        if (!r.ok) {
          throw new Error(`HTTP ${r.status}: ${json?.message || text.slice(0, 200)}`);
        }
        return json;
      })
      .then(data => {
        if (!data?.success) {
          addMessage('bot', "Oops! I'm having trouble understanding. Please try again.");
          return;
        }
        if (!isReset) {
          addMessage('bot', data.ai_message || '');
          if (data.options) addOptions(data.options);
        }
        if (data.chatbot_complete) {
          fetch(submitEndpoint, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrf,
            },
            body: JSON.stringify({}),
          })
            .then(async r => {
              const text = await r.text();
              let json;
              try {
                json = safeJsonParse(text);
              } catch {
                throw new Error(`Non-JSON response (${r.status})`);
              }
              if (!r.ok) {
                throw new Error(`HTTP ${r.status}`);
              }
              return json;
            })
            .then(sub => {
              if (sub?.success) {
                addMessage('bot', 'Your information has been submitted. We will get back to you shortly!');
              } else {
                addMessage('bot', 'There was an error submitting your information. Please try again later.');
              }
            })
            .catch((e) => {
              console.error('Chatbot submit error:', e);
              addMessage('bot', 'There was a server error submitting your info. Please try again later.');
            });
        }
      })
      .catch((e) => {
        console.error('Chatbot AI error:', e);
        addMessage('bot', `There was a server error. Please try again. (${String(e && e.message ? e.message : e).slice(0, 80)})`);
      });
  }

  function handleUserInput() {
    const userInput = (chatbotInput.value || '').trim();
    if (!userInput) return;
    addMessage('user', userInput);
    chatbotInput.value = '';
    sendToAI(userInput);
  }

  setTimeout(() => {
    chatbotWindow.style.display = 'flex';
    if (chatbotMessages.children.length === 0) sendToAI('');
  }, 25000);

  chatbotButton.addEventListener('click', () => {
    if (chatbotWindow.style.display === 'flex') {
      chatbotWindow.style.display = 'none';
    } else {
      chatbotWindow.style.display = 'flex';
      if (chatbotMessages.children.length === 0) sendToAI('');
    }
  });

  chatbotClose?.addEventListener('click', () => {
    chatbotWindow.style.display = 'none';
    chatbotMessages.innerHTML = '';
    sendToAI('', true);
  });

  chatbotSend?.addEventListener('click', handleUserInput);
  chatbotInput?.addEventListener('keypress', e => {
    if (e.key === 'Enter') handleUserInput();
  });
});
