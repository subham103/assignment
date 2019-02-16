function func() {
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    var particles = [];
    var num_particles = 1500;

    function GetRandomColor() {
        var r = 0, g = 0, b = 0;
        if (true)
        {
            r = Math.floor(Math.random() * 256);
            g = Math.floor(Math.random() * 256);
            b = Math.floor(Math.random() * 256);
        }

        return "rgb(" + r + "," + g + ","  + b + ")";
    }
    var Particle = function () {
        this.x = canvas.width * Math.random();
        this.y = canvas.height * Math.random();
        this.vx = 4 * Math.random() - 2;
        this.vy = 4 * Math.random() - 2;
        this.Color = GetRandomColor();
    }
    Particle.prototype.Draw = function (ctx) {
        ctx.fillStyle = this.Color;
        ctx.fillRect(this.x, this.y, 2, 2);
    }
    Particle.prototype.Update = function () {
        this.x += this.vx;
        this.y += this.vy;
     
        if (this.x<0 || this.x > canvas.width)
            this.vx = -this.vx;
     
        if (this.y < 0 || this.y > canvas.height)
            this.vy = -this.vy;
    }
    function loop() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (var i = 0; i < num_particles; i++) {
            particles[i].Update();
            particles[i].Draw(ctx);
        }
        requestAnimationFrame(loop);
    }
    for (var i = 0; i < num_particles; i++)
        particles.push(new Particle());
    loop();
    return 7;
}

function loadDoc1() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", "about.html", true);
          xhttp.send(); 
        }

function loadDoc2() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", "contact.html", true);
          xhttp.send(); 
        }

function loadDoc3() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", "resume.html", true);
          xhttp.send(); 
        }

function loadDoc4() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", "interest.html", true);
          xhttp.send(); 
        }
function loadDoc5() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", "index.html", true);
          xhttp.send(); 
        }
function loadDoc(file) {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("yay").innerHTML =this.responseText;
            }
          };
          
          xhttp.open("GET", file , true);
          xhttp.send(); 
        }



function push(url) {
    history.pushState(null, null, url);
}
// function replace(url) {
//     history.replaceState(null, null, url);
// }

window.onpopstate = function(event) {
    // console.log("history changed to: " + document.location.href);
    var path = window.location.pathname;
    var page = path.split("/").pop();
    loadDoc(page);
    func();
}