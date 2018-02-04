let $showWithAsterix = $('#show_with_asterix').click(function () {

    if ($(this).is(':checked')) {
        if (document.location.search) {
            document.location.search += '&show_with_asterix=on';
        } else {
            document.location.search += '?show_with_asterix=on';
        }
    } else {
        console.log(toString(document.location));
        document.location.search = removeURLParameter(document.location.search, 'show_with_asterix');
    }
});

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    let urlparts = url.split('?');
    if (urlparts.length >= 2) {

        let prefix = encodeURIComponent(parameter) + '=';
        let pars = urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (let i = pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        url = urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : "");
        return url;
    } else {
        return url;
    }
}

$('#hide_scored').click(function () {

    if ($(this).is(':checked')) {
        if (document.location.search) {
            document.location.search += '&hide_scored=on';
        } else {
            document.location.search += '?hide_scored=on';
        }
    } else {
        console.log(toString(document.location));
        document.location.search = removeURLParameter(document.location.search, 'hide_scored');
    }
});