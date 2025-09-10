  "use strict";

  // background animation
  (function() {

    var Base, Particle, canvas, colors, context, draw, drawables, i, mouseX, mouseY, mouseVX, mouseVY, rand, update, click, min, max, colors, particles;

    min = 1;
    max = 8;
    particles = 250;
    colors = ["7, 140, 183", "18, 153, 197", "49, 178, 218", "118, 201, 227"];

    rand = function(a, b) {
      return Math.random() * (b - a) + a;
    };

    Particle = (function() {
      function Particle() {
        this.reset();
      }

      Particle.prototype.reset = function() {
        this.color = colors[~~(Math.random()*colors.length)];
        this.radius = rand(min, max);
        this.x = rand(0, canvas.width);
        this.y = rand(-20, canvas.height*0.5);
        this.vx = -5 + Math.random()*10;
        this.vy = 0.7 * this.radius;
        this.valpha = rand(0.02, 0.09);
        this.opacity = 0;
        this.life = 0;
        this.onupdate = undefined;
        this.type = "dust";
      };

      Particle.prototype.update = function() {
        this.x = (this.x + this.vx/3);
        this.y = (this.y + this.vy/3);

        if(this.opacity >=1 && this.valpha > 0) this.valpha *=-1;
        this.opacity += this.valpha/3;
        this.life += this.valpha/3;

        if(this.type === "dust")
          this.opacity = Math.min(1, Math.max(0, this.opacity));
        else
          this.opacity = 1;

        if(this.onupdate) this.onupdate();
        if(this.life < 0 || this.radius <= 0 || this.y > canvas.height){
          this.onupdate = undefined;
          this.reset();
        }
      };

      Particle.prototype.draw = function(c) {
        c.strokeStyle = "rgba(" + this.color + ", " + Math.min(this.opacity, 0.85) + ")";
        c.fillStyle = "rgba(" + this.color + ", " + Math.min(this.opacity, 0.65) + ")";
        c.beginPath();
        c.arc(this.x, this.y, this.radius, 2 * Math.PI, false);
        c.fill();
        c.stroke();
      };

      return Particle;

    })();

    mouseVX = mouseVY = mouseX = mouseY = 0;

    canvas = document.getElementById("bg");
    context = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    drawables = (function() {
      var _i, _results;
      _results = [];
      for (i = _i = 1; _i <= particles; i = ++_i) {
        _results.push(new Particle);
      }
      return _results;
    })();

    draw = function() {
      var d, _i, _len;
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      context.clearRect(0, 0, canvas.width, canvas.height)

      for (_i = 0, _len = drawables.length; _i < _len; _i++) {
        d = drawables[_i];
        d.draw(context);
      }
    };

    update = function() {
      var d, _i, _len, _results;
      _results = [];
      for (_i = 0, _len = drawables.length; _i < _len; _i++) {
        d = drawables[_i];
        _results.push(d.update());
      }
      return _results;
    };

    document.onmousemove = function(e) {
      mouseVX = mouseX;
      mouseVY = mouseY;
      mouseX = ~~e.pageX;
      mouseY = ~~e.pageY;
      mouseVX = ~~((mouseVX - mouseX)/2);
      mouseVY = ~~((mouseVY - mouseY)/2);

    };

    window.addEventListener('resize', draw, false);
    setInterval(draw, 1000 / 30);
    setInterval(update, 1000 / 60);
  }).call(this);