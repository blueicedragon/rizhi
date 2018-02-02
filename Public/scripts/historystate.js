(function() {
    if (!window.addEventListener)
        return;
    var blockPopstateEvent = document.readyState!="complete";
    window.addEventListener("load", function() {
        setTimeout(function(){ blockPopstateEvent = false; }, 0);
    }, false);
    window.addEventListener("popstate", function(evt) {
        if (blockPopstateEvent && document.readyState=="complete") {
            evt.preventDefault();
            evt.stopImmediatePropagation();
        }
    }, false);
})();