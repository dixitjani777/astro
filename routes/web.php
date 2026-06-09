<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\Astrologer;
use App\Http\Controllers\Astrology;
use App\Http\Controllers\Gemstone;
use App\Http\Controllers\Home;
use App\Http\Controllers\Horoscope;
use App\Http\Controllers\Panditji;
use App\Http\Controllers\Query;
use App\Http\Controllers\Section;
use App\Http\Controllers\Vastu;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\OtpAuthController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Admin\EmailTemplatesController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\EmailInboxController;


// Route::get('/', function () {
//     return view('welcome');
// });

/* home */
//Route::get('/','Home@index');
Route::get('/', [Home::class, 'index']);

/* enquiries (contact/query/feedback/etc) */
Route::post('/enquiries', [EnquiryController::class, 'store'])
    ->middleware(['honeypot', 'throttle:15,1'])
    ->name('enquiries.store');

/* OTP auth */
Route::get('/account/loginwithotp', [OtpAuthController::class, 'show'])->name('otp.show');
Route::post('/otp/send', [OtpAuthController::class, 'send'])->middleware(['honeypot', 'throttle:8,1'])->name('otp.send');
Route::post('/otp/verify', [OtpAuthController::class, 'verify'])->middleware(['honeypot', 'throttle:12,1'])->name('otp.verify');
Route::match(['get', 'post'], '/logout', [OtpAuthController::class, 'logout'])->name('logout');

/* password auth (frontend) */
Route::post('/account/login/password', [Account::class, 'loginWithPassword'])->middleware(['honeypot', 'throttle:10,1'])->name('account.login.password');

/* admin auth */
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware(['honeypot', 'throttle:10,1'])->name('admin.login.post');

/* chatbot */
Route::post('/chatbot/ai', [ChatbotController::class, 'ai'])->middleware(['throttle:30,1'])->name('chatbot.ai');
Route::post('/chatbot/submit', [ChatbotController::class, 'submit'])->middleware(['throttle:20,1'])->name('chatbot.submit');

/* admin */
Route::middleware(['auth', 'admin', 'admin.log'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard')->middleware('perm:admin.dashboard');
    Route::get('/enquiries', [\App\Http\Controllers\Admin\EnquiriesController::class, 'index'])->name('enquiries.index')->middleware('perm:admin.enquiries');
    Route::get('/enquiries/{enquiry}', [\App\Http\Controllers\Admin\EnquiriesController::class, 'show'])->name('enquiries.show')->middleware('perm:admin.enquiries');
    Route::post('/enquiries/{enquiry}/replies', [\App\Http\Controllers\Admin\EnquiriesController::class, 'storeReply'])->name('enquiries.replies.store')->middleware('perm:admin.enquiries.reply');
    Route::delete('/enquiries/{enquiry}', [\App\Http\Controllers\Admin\EnquiriesController::class, 'destroy'])->name('enquiries.destroy')->middleware('perm:admin.enquiries');
    Route::post('/enquiries/bulk-delete', [\App\Http\Controllers\Admin\EnquiriesController::class, 'bulkDestroy'])->name('enquiries.bulk-delete')->middleware('perm:admin.enquiries');

    Route::get('/inbox', [EmailInboxController::class, 'index'])->name('inbox.index')->middleware('perm:admin.inbox');
    Route::get('/inbox/{messageId}', [EmailInboxController::class, 'show'])->name('inbox.show')->middleware('perm:admin.inbox');
    Route::get('/inbox/{messageId}/attachments/{attachmentId}', [EmailInboxController::class, 'downloadAttachment'])->name('inbox.attachments.download')->middleware('perm:admin.inbox');

    Route::middleware('perm:admin.users')->resource('users', \App\Http\Controllers\Admin\UsersController::class)->except(['show']);
    Route::post('users/bulk-delete', [\App\Http\Controllers\Admin\UsersController::class, 'bulkDestroy'])->name('users.bulk-delete')->middleware('perm:admin.users');
    Route::middleware('perm:admin.roles')->resource('roles', \App\Http\Controllers\Admin\RolesController::class)->except(['show']);
    Route::post('roles/bulk-delete', [\App\Http\Controllers\Admin\RolesController::class, 'bulkDestroy'])->name('roles.bulk-delete')->middleware('perm:admin.roles');
    Route::middleware('perm:admin.pages')->resource('pages', \App\Http\Controllers\Admin\CmsPagesController::class)->except(['show'])->parameters(['pages' => 'page']);
    Route::post('pages/bulk-delete', [\App\Http\Controllers\Admin\CmsPagesController::class, 'bulkDestroy'])->name('pages.bulk-delete')->middleware('perm:admin.pages');

    Route::middleware('perm:admin.blog')->prefix('blog')->name('blog.')->group(function () {
        Route::resource('categories', \App\Http\Controllers\Admin\BlogCategoriesController::class)->except(['show'])->parameters(['categories' => 'category']);
        Route::post('categories/bulk-delete', [\App\Http\Controllers\Admin\BlogCategoriesController::class, 'bulkDestroy'])->name('categories.bulk-delete');
        Route::resource('posts', \App\Http\Controllers\Admin\BlogPostsController::class)->except(['show'])->parameters(['posts' => 'post']);
        Route::post('posts/bulk-delete', [\App\Http\Controllers\Admin\BlogPostsController::class, 'bulkDestroy'])->name('posts.bulk-delete');
        Route::get('comments', [\App\Http\Controllers\Admin\BlogCommentsController::class, 'index'])->name('comments.index');
        Route::post('comments/{comment}/approve', [\App\Http\Controllers\Admin\BlogCommentsController::class, 'approve'])->name('comments.approve');
        Route::delete('comments/{comment}', [\App\Http\Controllers\Admin\BlogCommentsController::class, 'destroy'])->name('comments.destroy');
        Route::post('comments/bulk-delete', [\App\Http\Controllers\Admin\BlogCommentsController::class, 'bulkDestroy'])->name('comments.bulk-delete');
    });

    Route::middleware('perm:admin.offers')->resource('offers', \App\Http\Controllers\Admin\OffersController::class)->except(['show'])->parameters(['offers' => 'offer']);
    Route::post('offers/bulk-delete', [\App\Http\Controllers\Admin\OffersController::class, 'bulkDestroy'])->name('offers.bulk-delete')->middleware('perm:admin.offers');
    Route::middleware('perm:admin.ad_banners')->resource('ad-banners', \App\Http\Controllers\Admin\AdBannersController::class)->except(['show'])->parameters(['ad-banners' => 'ad_banner']);
    Route::post('ad-banners/bulk-delete', [\App\Http\Controllers\Admin\AdBannersController::class, 'bulkDestroy'])->name('ad-banners.bulk-delete')->middleware('perm:admin.ad_banners');

    Route::middleware('perm:admin.settings')->resource('settings', \App\Http\Controllers\Admin\SettingsController::class)->except(['show']);
    Route::post('settings/bulk-delete', [\App\Http\Controllers\Admin\SettingsController::class, 'bulkDestroy'])->name('settings.bulk-delete')->middleware('perm:admin.settings');

    Route::middleware('perm:admin.email_templates')->resource('email-templates', EmailTemplatesController::class)->only(['index', 'edit', 'update'])->parameters(['email-templates' => 'email_template']);

    Route::middleware('perm:admin.daily_horoscopes')->resource('daily-horoscopes', \App\Http\Controllers\Admin\DailyHoroscopesController::class)->only(['index', 'edit', 'update'])->parameters(['daily-horoscopes' => 'daily_horoscope']);

    Route::middleware('perm:admin.horoscope_content')->resource('horoscope-contents', \App\Http\Controllers\Admin\HoroscopeContentsController::class)->except(['show'])->parameters(['horoscope-contents' => 'horoscope_content']);

    Route::middleware('perm:admin.home_services')->resource('home-services', \App\Http\Controllers\Admin\HomeServicesController::class)->except(['show'])->parameters(['home-services' => 'home_service']);
    Route::middleware('perm:admin.pandit_services')->resource('pandit-services', \App\Http\Controllers\Admin\PanditServicesController::class)->except(['show'])->parameters(['pandit-services' => 'pandit_service']);
    Route::middleware('perm:admin.home_sliders')->resource('home-sliders', \App\Http\Controllers\Admin\HomeSlidersController::class)->except(['show'])->parameters(['home-sliders' => 'home_slider']);

    Route::get('contact-settings', [\App\Http\Controllers\Admin\ContactSettingsController::class, 'edit'])->name('contact-settings.edit')->middleware('perm:admin.contact');
    Route::put('contact-settings', [\App\Http\Controllers\Admin\ContactSettingsController::class, 'update'])->name('contact-settings.update')->middleware('perm:admin.contact');
    Route::get('smtp-settings', [\App\Http\Controllers\Admin\SmtpSettingsController::class, 'edit'])->name('smtp-settings.edit')->middleware('perm:admin.smtp');
    Route::put('smtp-settings', [\App\Http\Controllers\Admin\SmtpSettingsController::class, 'update'])->name('smtp-settings.update')->middleware('perm:admin.smtp');
    Route::post('smtp-settings/test', [\App\Http\Controllers\Admin\SmtpSettingsController::class, 'test'])->name('smtp-settings.test')->middleware('perm:admin.smtp');
    Route::get('activity', [\App\Http\Controllers\Admin\ActivityLogsController::class, 'index'])->name('activity.index')->middleware('perm:admin.activity');
    Route::post('activity/bulk-delete', [\App\Http\Controllers\Admin\ActivityLogsController::class, 'bulkDestroy'])->name('activity.bulk-delete')->middleware('perm:admin.activity');

    Route::post('tools/clear-cache', [\App\Http\Controllers\Admin\ToolsController::class, 'clearCache'])->name('tools.clear-cache')->middleware('perm:admin.tools');
});

/* query */
Route::get('/query',[Query::class,'index']);

/* account */
Route::get('/account',[Account::class,'index']);
Route::get('/account/resetpassword',[Account::class,'forgotpassword']);
Route::post('/account/resetpassword', [Account::class, 'sendPasswordResetLink'])->name('password.email');
Route::get('/account/resetpassword/{token}', [Account::class, 'showResetForm'])->name('password.reset');
Route::post('/account/resetpassword/{token}', [Account::class, 'resetPassword'])->name('password.update');

/* My account */
Route::middleware('auth')->group(function () {
    Route::get('/myaccount/querystatus',[Account::class,'querystatus']);
    Route::get('/myaccount/enquiries/{enquiry}', [\App\Http\Controllers\Account\EnquiriesController::class, 'show'])->name('account.enquiries.show');
    Route::post('/myaccount/enquiries/{enquiry}/replies', [\App\Http\Controllers\Account\EnquiriesController::class, 'storeReply'])->name('account.enquiries.replies.store');
    Route::get('/myaccount/report',[Account::class,'report']);
    Route::get('/myaccount/astrologerbooking',[Account::class,'astrologerbooking']);
    Route::get('/myaccount/gemstonesuggestion',[Account::class,'gemstonesuggestion']);
    Route::get('/myaccount/bookpanditJi',[Account::class,'bookpanditJi']);
    Route::get('/myaccount/vastu-specific',[Account::class,'vastu_specific']);
    Route::get('/myaccount/orders',[Account::class,'orders']);
    Route::get('/myaccount/setting',[Account::class,'setting']);

    Route::post('/myaccount/setting', [Account::class, 'updateSettings'])->name('myaccount.settings.update');
    Route::post('/myaccount/password', [Account::class, 'updatePassword'])->name('myaccount.password.update');
    Route::post('/myaccount/password/otp/send', [Account::class, 'sendPasswordOtp'])->name('myaccount.password.otp.send');
    Route::post('/myaccount/password/otp/verify', [Account::class, 'verifyPasswordOtp'])->name('myaccount.password.otp.verify');
});

/* astrology */
Route::get('/astrology/about',[Astrology::class,'about']);
Route::get('/astrology/planets',[Astrology::class,'planets']);
Route::get('/astrology/signs',[Astrology::class,'signs']);
Route::get('/astrology/houses',[Astrology::class,'houses']);

/* horoscope */
Route::get('/horoscope/about',[Horoscope::class,'about']);
Route::get('/horoscope/prediction/daily',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/weekly',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/monthly',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/yearly',[Horoscope::class,'prediction']);

Route::get('/horoscope/daily/aries',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/taurus',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/gemini',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/cancer',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/leo',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/virgo',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/libra',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/scorpio',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/sagittarius',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/capricorn',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/aquarius',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/pisces',[Horoscope::class,'daily']);

Route::get('/horoscope/weekly/aries',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/taurus',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/gemini',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/cancer',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/leo',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/virgo',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/libra',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/scorpio',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/sagittarius',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/capricorn',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/aquarius',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/pisces',[Horoscope::class,'weekly']);

Route::get('/horoscope/monthly/aries',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/taurus',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/gemini',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/cancer',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/leo',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/virgo',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/libra',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/scorpio',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/sagittarius',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/capricorn',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/aquarius',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/pisces',[Horoscope::class,'monthly']);

Route::get('/horoscope/yearly/aries',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/taurus',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/gemini',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/cancer',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/leo',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/virgo',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/libra',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/scorpio',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/sagittarius',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/capricorn',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/aquarius',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/pisces',[Horoscope::class,'yearly']);

Route::get('/horoscope/report',[Horoscope::class,'report']);
Route::get('/horoscope/matching',[Horoscope::class,'matching']);

/* astrologer */

Route::get('/astrologer/book',[Astrologer::class,'book']);

// Route::get('/astrologer/call',[Astrologer::class,'call']);
// Route::get('/astrologer/videocall',[Astrologer::class,'videocall']);
// Route::get('/astrologer/meet',[Astrologer::class,'meet']);

/* gemstone */
Route::get('/gemstone/about',[Gemstone::class,'about']);
Route::get('/gemstone/recommendations',[Gemstone::class,'recommendations']);
Route::get('/gemstone/buy',[Gemstone::class,'buy']);

Route::get('/gemstone/purchase/blue_sapphire',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/ruby',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/emerald',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/pearl',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/red_coral',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/yellow_sapphire',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/diamond',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/hessonite',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/cats_eye',[Gemstone::class,'purchase']);

/* panditji */
Route::get('/panditji/book',[Panditji::class,'book']);
Route::get('/panditji/services',[Panditji::class,'services']);
Route::get('/panditji/puja-services',[Panditji::class,'puja_services']);
Route::get('/panditji/havan-services',[Panditji::class,'havan_services']);
Route::get('/panditji/jaap',[Panditji::class,'jaap']);
Route::get('/panditji/katha',[Panditji::class,'katha']);

Route::get('/panditji/pujas',[Panditji::class,'pujas']);

/* vastu */
Route::get('/vastu',[Vastu::class,'index']);

/* section */
Route::get('/teamwork',[Section::class,'teamwork']);
Route::get('/donate',[Section::class,'donate']);
Route::get('/contact',[Section::class,'contact']);
Route::get('/about',[Section::class,'about']);
Route::get('/blogs',[Section::class,'blogs']);
Route::get('/readblog/{post:slug}',[Section::class,'readblog']);
Route::get('/readblog/{slug}/{post}', function ($slug, \App\Models\BlogPost $post) {
	return redirect("/readblog/{$post->slug}", 301);
})->whereNumber('post');
Route::get('/teamactivity',[Section::class,'teamactivity']);
Route::get('/disclaimer',[Section::class,'disclaimer']);
Route::get('/feedback',[Section::class,'feedback']);
Route::get('/payment',[Section::class,'payment']);
Route::get('/privacy',[Section::class,'privacy']);
Route::get('/terms',[Section::class,'terms']);
Route::get('/page/{slug}',[Section::class,'page']);
