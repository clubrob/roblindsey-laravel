/* document.onreadystatechange = function () {
    if (document.readyState == 'interactive') {
        
        var evEl = document.querySelector('.botdot-toggle');

        evEl.addEventListener('click', function(event) {
            event.preventDefault();
        
            let el = document.querySelector('.navbar-menu');
            
            if(el.style.width == '') {
                el.style.width = '260px';
            } else if(el.style.width == '260px') {
                el.style.width = '';
            } 
        }, false);
    }
} */