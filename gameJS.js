$(document).ready(function(){
var currentSelectedClass ="";
$("#knight").click(() =>{
	window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?class=1"; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateClass.php?class=1", true);
xmlhttp.send();
});
$("#rogue").click(() =>{
	window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?class=2"; 

	var currentSelectedClass = "Rogue";
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateClass.php?class=2", true);
xmlhttp.send();

});
$("#archer").click(() =>{
	window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?class=3"; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateClass.php?class=3", true);
xmlhttp.send();
});
$("#mage").click(() =>{
	window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/game.php?class=4"; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateClass.php?class=4", true);
xmlhttp.send();
});

	var xmlhttp = new XMLHttpRequest();
var player_class ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        console.log(this.responseText);
        player_class = PlayerObj.class;
var skill=0;
	$("#resetSkills").click(() =>{
		skill = 0;
		var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=9", true);
xmlhttp.send();
document.getElementById("current1").src='';
document.getElementById("current2").src='';
document.getElementById("current3").src='';
document.getElementById("current4").src='';
	});
if (player_class == 1){
	//$("div#knight span img").onmouseover()
	$("#S9").click(() =>{
		if(skill < 4){
			skill = skill +1;
		 document.getElementById("current" +skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/swordStrike.jpg'; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=9", true);
xmlhttp.send();
		
				}
		///console.log(skill);
	});
	$("#S10").click(() =>{
			if(skill < 4){
				skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/thrust.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=10", true);
xmlhttp.send();
			}
		//console.log(skill);
	});
	$("#S11").click(() =>{
			if(skill < 4){
				skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/smash.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=11", true);
xmlhttp.send();
			}
		
	});
	$("#S12").click(() =>{
					if(skill < 4){
						skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/crushingBlow.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=12", true);
xmlhttp.send();
			}
		
	});
	$("#S13").click(() =>{
					if(skill < 4){
						skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/flameBlade.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=13", true);
xmlhttp.send();
			}
		
	});
	$("#S14").click(() =>{
					if(skill < 4){
						skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/frozenWindblade.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=14", true);
xmlhttp.send();
			}
		
	});
	$("#S15").click(() =>{
					if(skill < 4){
						skill = skill +1;

		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/gougerOfMountains.jpg';
								var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=15", true);
xmlhttp.send();
							}
		
	});
	$("#S16").click(() =>{
					if(skill < 4){
							skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/worldBreaker.jpg';
				var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=16", true);
xmlhttp.send();
			}
		
	});


}
if (player_class == 2){
	//$("div#knight span img").onmouseover()
	$("#S1").click(() =>{
		if(skill < 4){
			skill = skill +1;
		 document.getElementById("current" +skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/quickStab.jpg'; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=1", true);
xmlhttp.send();
		
				}
		///console.log(skill);
	});
	$("#S2").click(() =>{
			if(skill < 4){
				skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/doubleStrike.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=2", true);
xmlhttp.send();
			}
		//console.log(skill);
	});
	$("#S3").click(() =>{
			if(skill < 4){
				skill = skill +1;
						document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/spinningThrow.jpg';
		
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=3", true);
xmlhttp.send();
			}
		
	});
	$("#S4").click(() =>{
					if(skill < 4){
						skill = skill +1;
document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/slashingFury.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=4", true);
xmlhttp.send();
			}
		
	});
	$("#S5").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/dragonsFang.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=5", true);
xmlhttp.send();
			}
		
	});
	$("#S6").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/shadowRazor.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=6", true);
xmlhttp.send();
			}
		
	});
	$("#S7").click(() =>{
					if(skill < 4){
						skill = skill +1;
	document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/breakerOfSilence.jpg';
								var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=7", true);
xmlhttp.send();
							}
		
	});
	$("#S8").click(() =>{
					if(skill < 4){
							skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/hopesEnd.jpg';
				var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=8", true);
xmlhttp.send();
			}
		
	});


}



if (player_class == 3){
	//$("div#knight span img").onmouseover()
	$("#S25").click(() =>{
		if(skill < 4){
			skill = skill +1;
		 document.getElementById("current" +skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/arrow.jpg'; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=25", true);
xmlhttp.send();
		
				}
		///console.log(skill);
	});
	$("#S26").click(() =>{
			if(skill < 4){
				skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/piercingShot.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=26", true);
xmlhttp.send();
			}
		//console.log(skill);
	});
	$("#S27").click(() =>{
			if(skill < 4){
				skill = skill +1;
						document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/tripleShot.jpg';
		
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=27", true);
xmlhttp.send();
			}
		
	});
	$("#S28").click(() =>{
					if(skill < 4){
						skill = skill +1;
document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/arrowRain.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=28", true);
xmlhttp.send();
			}
		
	});
	$("#S29").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/spinningSnipe.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=29", true);
xmlhttp.send();
			}
		
	});
	$("#S30").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/infusedArcaneMissle.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=30", true);
xmlhttp.send();
			}
		
	});
	$("#S31").click(() =>{
					if(skill < 4){
						skill = skill +1;
	document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/windReflexBow.jpg';
								var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=31", true);
xmlhttp.send();
							}
		
	});
	$("#S32").click(() =>{
					if(skill < 4){
							skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/headsplitterBow.jpg';
				var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=32", true);
xmlhttp.send();
			}
		
	});


}


if (player_class == 4){
	//$("div#knight span img").onmouseover()
	$("#S17").click(() =>{
		if(skill < 4){
			skill = skill +1;
		 document.getElementById("current" +skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/arcaneBolt.jpg'; 
	var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=17", true);
xmlhttp.send();
		
				}
		///console.log(skill);
	});
	$("#S18").click(() =>{
			if(skill < 4){
				skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/magicMissles.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=18", true);
xmlhttp.send();
			}
		//console.log(skill);
	});
	$("#S19").click(() =>{
			if(skill < 4){
				skill = skill +1;
						document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/lightningStrike.jpg';
		
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=19", true);
xmlhttp.send();
			}
		
	});
	$("#S20").click(() =>{
					if(skill < 4){
						skill = skill +1;
document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/meteor.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=20", true);
xmlhttp.send();
			}
		
	});
	$("#S21").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/flux.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=21", true);
xmlhttp.send();
			}
		
	});
	$("#S22").click(() =>{
					if(skill < 4){
						skill = skill +1;
				document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/armageddon.jpg';
					var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=22", true);
xmlhttp.send();
			}
		
	});
	$("#S23").click(() =>{
					if(skill < 4){
						skill = skill +1;
	document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/divinityScepter.jpg';
								var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=23", true);
xmlhttp.send();
							}
		
	});
	$("#S24").click(() =>{
					if(skill < 4){
							skill = skill +1;
		document.getElementById("current"+skill).src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/supernova.jpg';
				var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "updateSkills.php?skillnum=" +skill+ "&skill=24", true);
xmlhttp.send();
			}
		
	});


}



       // document.getElementById("cpiplayerhealth").innerHTML = PlayerObj.health;
        //console.log(player_name);
       // document.getElementById('player_name').innerHTML = player_name;
    }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();


});

