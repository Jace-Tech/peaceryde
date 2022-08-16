<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function() {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/62f54a1037898912e9627c53/1ga72ilfs';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>
<script>
  function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'en,es,hi,pl,pt,zh-CN,zh-TW,ar,so,ru,hy,ko,fr,vi',
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

jQuery('.lang-select').click(function() {
  var theLang = jQuery(this).attr('data-lang');
  jQuery('.goog-te-combo').val(theLang);

  localStorage.setItem('lang', theLang);
//   window.location = jQuery(this).attr('href');
  location.reload();
});

window.addEventListener("beforeload", () => {
    const lang = localStorage.getItem('lang');
    if (lang) {
        jQuery('.goog-te-combo').val(lang);
    }
}, false);


</script> 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>