$(function(){var n,o,r,i;return n=$("#cover"),o=$("#cover .pin img"),i=0,r=0,$(window).on("mousemove",function(t){var e,c,s;return t.clientX!==i?(e=$(window).width(),e>768?(i=t.clientX,r=2*i/e-1):(i=0,r=0),c=10*(r+1)+50+"% 0%, center",s=5*r+"px",n.css("background-position",c),o.css("transform","translateX("+s+")")):void 0})});