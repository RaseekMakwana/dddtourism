function skipToMainContent(){
        $('html, body').animate({
            scrollTop: $("#skip-to-main-content").offset().top-60
        }, 1000);
}

var SiteFontCommonSection;
var SiteFontCommonfactor = 0.9;
var SiteFontCommonCount = 0;
function getFontSize(el)
{
    var fs = $(el).css('font-size');
    if (!el.originalFontSize)
        el.originalFontSize = fs; //set dynamic property for later reset
    return  parseFloat(fs);
}
function setFontSize(fact) {
    if (SiteFontCommonSection == null)
        SiteFontCommonSection = $('body').not('.font-size-change').find('*')
                .filter(
                        function () {
                            return  $(this).clone()
                                    .children()
                                    .remove()
                                    .end()
                                    .text().trim().length > 0;
                        }); //filter -> exclude all elements without text

    SiteFontCommonSection.each(function () {
        var newsize = fact ? getFontSize(this) * fact : this.originalFontSize;
        if (newsize)
            $(this).css('font-size', newsize);
    });
}

function resetFont() {
    setFontSize();
    SiteFontCommonCount = 0;
}

function increaseFont() {
    if (SiteFontCommonCount < 1)
    {
        setFontSize(1 / SiteFontCommonfactor);
        SiteFontCommonCount++
    }
}

function decreaseFont() {
    if (SiteFontCommonCount > -1)
    {
        setFontSize(SiteFontCommonfactor);
        SiteFontCommonCount--
    }
}
