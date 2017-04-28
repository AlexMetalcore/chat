	var t = setInterval (function (y){
		if (document.getElementById('timer') == null){
			return false;
		}
                function f (x) {
                        return (x / 10).toFixed (1).substr (2)
                }
                var o = document.getElementById ('timer');
                var s = o.innerHTML;
                s--;
                if (s < 0) {
                	s = o.getAttribute ('long');
		}
                        o.innerHTML = f(s);
                }, 1000);	
