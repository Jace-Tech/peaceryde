function googleTranslateElementInit () {
    new google.translate.TranslateElement({
        pageLanguage: 'en', includedLanguages: 'en,es,hi,pl,pt,zh-CN,zh-TW,ar,so,ru,hy,ko,fr,vi',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
}

function triggerHtmlEvent(element, eventName) {
    var event;
    if (document.createEvent) {
      event = document.createEvent('HTMLEvents');
      event.initEvent(eventName, true, true);
      element.dispatchEvent(event);
    } else {
      event = document.createEventObject();
      event.eventType = eventName;
      element.fireEvent('on' + event.eventType, event);
    }
  }


  jQuery('.lang-select').click(function(e) {
    var theLang = jQuery(this).attr('data-lang');
    jQuery('.goog-te-combo').val(theLang);
    document.querySelectorAll(".langName").forEach(item => {
        item.innerHTML = jQuery(this).html();
    })

    window.location = jQuery(this).attr('href');
    location.reload();

  });