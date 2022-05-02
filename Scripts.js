var playerName;
var damage;


var IS_TOWER_LOADED;
var switched = false;
var player_position = 0;
var isHost;
$(document).ready(() => {
 var cooldown_1 = 0;
 var cooldown_2;
 var cooldown_3;
 var cooldown_4;
	 var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "position_update.php?position=0", true);
        xmlhttp.send();
var xmlhttp = new XMLHttpRequest();
var player_name ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        console.log(this.responseText);
        player_name = PlayerObj.name;
        player_health = PlayerObj.health;
        isHost = PlayerObj.isHOST;
        //console.log("oiejjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjwfsoifj"+ isHost);
        }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();


function hide(me){
	$("#" + me).removeClass("show");
	$("#" + me).addClass("hide");
	//console.log("test");
}
window.show = function (me){
	$("#" + me).removeClass("hide");
	$("#" + me).addClass("show");
//console.log("test");
}

function Next(previous, next){
	$("#" + previous).removeClass("show");
	$("#" + previous).addClass("hide");
	$("#" + next).removeClass("hide");
	$("#" + next).addClass("show");

}

/*$("#start").click(() =>{
	Next('start', 'characterSelection');
});*/
function attack(damage, target){

	console.log(target);
	return target- damage;

}

var cpiUPDATE = setInterval(playerCPIupdate, 500);
var mpiUPDATE = setInterval(playerMPIupdate, 500);
var bpiUPDATE = setInterval(playerBPIupdate, 500);
var attackUPDATE = setInterval(otherAttack, 500);
var towerUPDATE = setInterval(towerUp, 500);

function towerUp(){
	if(isHost == 0){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	Rhost = JSON.parse(this.responseText);
    	curTower = Rhost.tower;
    	if(curTower != towerNUMBER){
    		 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();
    	}
    }
};
        	xmlhttp.open("GET", "getHost.php", true);
xmlhttp.send();
}
}
function otherAttack(){
	if(isHost == 1){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	damageo = this.responseText;
    	console.log(damageo);
Enemy_health = attack(damageo, Enemy_health);
       
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.open("GET", "updateRoomBossHP.php?health=" + Enemy_health, true);
xmlhttp.send();
        
if(Enemy_health <= 0 ){
 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();
	}else{
	document.getElementById("bosshealth").innerHTML = Enemy_health;
}
    }
	};
xmlhttp.open("GET", "getRoomPlayers.php?", true);
xmlhttp.send();
}else{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	 ROOME = JSON.parse(this.responseText);
    	Enemy_health = ROOME.bossHP;
    	document.getElementById("bosshealth").innerHTML = Enemy_health;
    }
	};
xmlhttp.open("GET", "getHost.php", true);
xmlhttp.send();
}
}


function playerCPIupdate(){

		var xmlhttp = new XMLHttpRequest();
var player_name ="";
var player_health ="";

xmlhttp.onreadystatechange = function() {
	//console.log("test");
    if (this.readyState == 4 && this.status == 200) {
    	//console.log(this.responseText);
      players_attacked = JSON.parse(this.responseText);
      players_name = players_attacked.name;
      players_health = players_attacked.health;
      players_avatar = players_attacked.file_name;
       if(players_avatar != null){
       	      	if(players_health <= 0){
      		document.getElementById("cpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.png';
      	}else{
       document.getElementById("cpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + players_avatar;
   }
   }
       document.getElementById("cpiplayername").innerHTML = players_name;
      if(players_health != null){
      //console.log(players_health);
     // console.log(players_attacked.health);
     /* console.log(player_attacked['0']['name']);
      console.log(player_attacked['0']['health']);*/
     if(isHost == 0){   
 document.getElementById("cpiplayerhealth").innerHTML= players_health; 
 }
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=1", true);
xmlhttp.send();
}

function playerMPIupdate(){

		var xmlhttp = new XMLHttpRequest();
var player_name ="";
var player_health ="";

xmlhttp.onreadystatechange = function() {
	//console.log("test");
    if (this.readyState == 4 && this.status == 200) {
    	//console.log(this.responseText);
      players_attacked = JSON.parse(this.responseText);
      players_name = players_attacked.name;
      players_health = players_attacked.health;
      players_avatar = players_attacked.file_name;
       if(players_avatar != null){
       	      	if(players_health <= 0){
      		document.getElementById("mpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.png';
      	}else{
      document.getElementById("mpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + players_avatar;
  }
  }
      document.getElementById("mpiplayername").innerHTML = players_name;
      if(players_health != null){
     // console.log(players_health);
     // console.log(players_attacked.health);
     /* console.log(player_attacked['0']['name']);
      console.log(player_attacked['0']['health']);*/
     if(isHost == 0){   
 document.getElementById("mpiplayerhealth").innerHTML= players_health; 
 }
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=2", true);
xmlhttp.send();

}

function playerBPIupdate(){

		var xmlhttp = new XMLHttpRequest();
var player_name ="";
var player_health ="";

xmlhttp.onreadystatechange = function() {
	//console.log("test");
    if (this.readyState == 4 && this.status == 200) {
    	//console.log(this.responseText);
      players_attacked = JSON.parse(this.responseText);
      players_name = players_attacked.name;
      players_health = players_attacked.health;
      players_avatar = players_attacked.file_name;
      if(players_avatar != null){
      	if(players_health <= 0){
      		document.getElementById("bpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.png';
      	}else{
       document.getElementById("bpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + players_avatar;
   }
   }
       document.getElementById("bpiplayername").innerHTML = players_name;
      if(players_health != null){
     // console.log(players_health);
     // console.log(players_attacked.health);
     /* console.log(player_attacked['0']['name']);
      console.log(player_attacked['0']['health']);*/
      if(isHost == 0){  
 document.getElementById("bpiplayerhealth").innerHTML= players_health; 
 }
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=3", true);
xmlhttp.send();

}









var myVar = setInterval(enemy_Attack1, 2500);
var myVar = setInterval(enemy_Attack2, 3500);
var myVar = setInterval(enemy_Attack3, 5000);
/*var enemyUpdate = setInterval(enemyUP, 5000);
function enemyUP(){
	
var xmlhttp = new XMLHttpRequest();
var Enemy ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        EnemyObj = JSON.parse(this.responseText);
        //console.log("test");
        Enemy = EnemyObj.name;
        Enemy_health = EnemyObj.health;
        document.getElementById("bosshealth").innerHTML = Enemy_health;
//console.log(this.responseText);
       // console.log(Enemy_health);
      //  document.getElementById('player_name').innerHTML = player_name;
    }
};
xmlhttp.open("GET", "convertEnemy.php", true);
xmlhttp.send();
}*/
   

function enemy_Attack1(){

	//console.log("test");
	var xmlhttp = new XMLHttpRequest();
var player_name1 ="";
var player_health1 ="";

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      players_attacked = JSON.parse(this.responseText);
      players_name1 = players_attacked.name;
      players_health1 = players_attacked.health;
      players_avatar = players_attacked.file_name;
      //console.log(players_health1);
      if(players_health1 != null){
       if(isHost ==1){
       	var xmlhttp = new XMLHttpRequest();
var Enemy ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        EnemyObj = JSON.parse(this.responseText);
        console.log("test");
        Enemy = EnemyObj.name;
       // Enemy_health = EnemyObj.health;
        //console.log(Enemy);
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
Eattack1 = JSON.parse(this.responseText);
 dmg1 = Eattack1.damage;
 Ecooldown1 = Eattack1.cooldown;
 //console.log(dmg1);
      players_health1 =  attack(dmg1, players_health1);
   var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "update_player.php?name=" + players_name1 + "&health=" + players_health1, true);
xmlhttp.send();
 document.getElementById("cpiplayerhealth").innerHTML= players_health1; 

            }
        };
         x = Math.floor(Math.random() * 4) + 1;
         console.log(x);
        xmlhttp.open("GET", "convertESkill.php?name=" + EnemyObj.name + "&skill=" +  x, true);
xmlhttp.send();
    }
};
xmlhttp.open("GET", "convertEnemy.php", true);
xmlhttp.send();
       	

}
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=1", true);
xmlhttp.send();
//console.log(players_health);
   
//}
	//player_health =  attack(3, player_health);




}

function enemy_Attack2(){
	//console.log("test");
	var xmlhttp = new XMLHttpRequest();
var player_name2 ="";
var player_health2 ="";

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      players_attacked = JSON.parse(this.responseText);
      players_name2 = players_attacked.name;
      players_health2 = players_attacked.health;
      players_avatar = players_attacked.file_name;
      if(players_health2 != null){
       if(isHost ==1){
       	var xmlhttp = new XMLHttpRequest();
var Enemy ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        EnemyObj = JSON.parse(this.responseText);
       // console.log("test");
        Enemy = EnemyObj.name;
        //Enemy_health = EnemyObj.health;
       // console.log(Enemy);
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
Eattack2 = JSON.parse(this.responseText);
 dmg2 = Eattack2.damage;
 Ecooldown2 = Eattack2.cooldown;
      players_health2 =  attack(dmg2, players_health2);
   var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "update_player.php?name=" + players_name2 + "&health=" + players_health2, true);
xmlhttp.send();
 document.getElementById("mpiplayerhealth").innerHTML= players_health2; 

            }
        };
         x = Math.floor(Math.random() * 4) + 1;
         console.log(x);
        xmlhttp.open("GET", "convertESkill.php?name=" + EnemyObj.name + "&skill=" +  x, true);
xmlhttp.send();
    }
};
xmlhttp.open("GET", "convertEnemy.php", true);
xmlhttp.send();
       	

}
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=2", true);
xmlhttp.send();
//console.log(players_health);
   
//}
	//player_health =  attack(3, player_health);




}

function enemy_Attack3(){
	//console.log("test");
	var xmlhttp = new XMLHttpRequest();
var player_name ="";
var player_health3 ="";

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      players_attacked = JSON.parse(this.responseText);
      players_name = players_attacked.name;
      players_health3 = players_attacked.health;
      players_avatar = players_attacked.file_name;
      if(players_health3 != null){
       if(isHost ==1){
       	var xmlhttp = new XMLHttpRequest();
var Enemy ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        EnemyObj = JSON.parse(this.responseText);
        //console.log("test");
        Enemy = EnemyObj.name;
        //Enemy_health = EnemyObj.health;
       // console.log(Enemy);
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
Eattack = JSON.parse(this.responseText);
 dmg = Eattack.damage;
 Ecooldown = Eattack.cooldown;
      players_health3 =  attack(dmg, players_health3);
   var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "update_player.php?name=" + players_name + "&health=" + players_health3, true);
xmlhttp.send();
 document.getElementById("bpiplayerhealth").innerHTML= players_health3; 

            }
        };
         x = Math.floor(Math.random() * 4) + 1;
         console.log(x);
        xmlhttp.open("GET", "convertESkill.php?name=" + EnemyObj.name + "&skill=" +  x, true);
xmlhttp.send();
    }
};
xmlhttp.open("GET", "convertEnemy.php", true);
xmlhttp.send();
       	

}
}
    }
};
xmlhttp.open("GET", "getPosition.php?position=3", true);
xmlhttp.send();
//console.log(players_health);
   
//}
	//player_health =  attack(3, player_health);



}




$("#closePlayerImage").click(() =>{
	if(!switched){
	 var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "position_update.php?position=1", true);
        xmlhttp.send();
	 document.getElementById("cpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.file_name; 
	  document.getElementById("cpiplayerhealth").innerHTML= PlayerObj.health; 
	  player_position = 1;
	}
	 switched = true;
		//window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/playGame.php?place=1"; 
	});
$("#middlePlayerImage").click(() =>{
	if(!switched){
		 var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "position_update.php?position=2", true);
        xmlhttp.send();
	 document.getElementById("mpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.file_name; 
	  document.getElementById("mpiplayerhealth").innerHTML= PlayerObj.health; 
	  player_position = 2;
//window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/playGame.php?place=2"; 
}
switched = true;
	});
$("#bottomPlayerImage").click(() =>{
	if(!switched){
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "position_update.php?position=3", true);
        xmlhttp.send();
	 document.getElementById("bpi").src= 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/' + PlayerObj.file_name; 
	  document.getElementById("bpiplayerhealth").innerHTML= PlayerObj.health;
	  player_position = 3; 
//window.location.href = "http://atdpsites.berkeley.edu/awu/aic/project 2/playGame.php?place=3"; 
}
switched = true;
	});

	

$(function(){
$("#skill_1").click(() =>{
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        position = PlayerObj.position;
        console.log(position);
        if(position != 0){
 			var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                skill =  JSON.parse(this.responseText);
                damage = skill.damage;
                cooldown = skill.cooldown;
                skillName = skill.skillName;
                ani = skill.ani;
                document.getElementById("topHiti").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/melee.gif';
                   var btn = $("#skill_1");
    btn.prop('disabled',true);
    window.setTimeout(function(){ 
        btn.prop('disabled',false);
    },cooldown *1000);
                	if(damage == null){
					}else{
						if(isHost == 1){

					Enemy_health = attack(damage, Enemy_health);
					console.log(Enemy_health);
					console.log(damage); 
				}else{
					var xmlhttp = new XMLHttpRequest();
					        xmlhttp.open("GET", "sendAttack.php?damage=" + damage +"&skill=1", true);
        xmlhttp.send();
				}
	if(Enemy_health <= 0 ){
 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();
	}else{
	document.getElementById("bosshealth").innerHTML = Enemy_health;
}
			var cool1 = setInterval(cooldown1, 1000);
				function cooldown1() {
				document.getElementById("cooldown1").innerHTML = cooldown;
				  cooldown = cooldown-1;
				  if(cooldown <= 0){
				  	cooldown= 0;
				  	  document.getElementById("cooldown1").innerHTML = 0;
				  clearInterval(cool1);
}
}
}
            }
        };
        xmlhttp.open("GET", "convertAttack.php?skill=1", true);
        xmlhttp.send();
    }
}
	};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();
//console.log(cooldown_1);
   



});
});

$(function(){
$("#skill_2").click(() =>{
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        position = PlayerObj.position;
        console.log(position);
        if(position != 0){
 			var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                skill =  JSON.parse(this.responseText);
                damage = skill.damage;
                cooldown2 = skill.cooldown;
                skillName = skill.skillName;
                                ani = skill.ani;
                document.getElementById("topHiti").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/melee.gif';
                   var btn = $("#skill_2");
    btn.prop('disabled',true);
    window.setTimeout(function(){ 
        btn.prop('disabled',false);
    },cooldown2 *1000);
                	if(damage == null){
					}else{
					if(isHost == 1){

					Enemy_health = attack(damage, Enemy_health);
					console.log(Enemy_health);
					console.log(damage); 
				}else{
					var xmlhttp = new XMLHttpRequest();
					        xmlhttp.open("GET", "sendAttack.php?damage=" + damage +"&skill=2", true);
        xmlhttp.send();
				}
	if(Enemy_health <= 0 ){
 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();
	}else{
	document.getElementById("bosshealth").innerHTML = Enemy_health;
}
			var cool1 = setInterval(cooldown1, 1000);
				function cooldown1() {
				document.getElementById("cooldown2").innerHTML = cooldown2;
				  cooldown2 = cooldown2-1;
				  if(cooldown2 <= 0){
				  	cooldown2= 0;
				  	  document.getElementById("cooldown2").innerHTML = 0;
				  clearInterval(cool1);
}
}
}
            }
        };
        xmlhttp.open("GET", "convertAttack.php?skill=2", true);
        xmlhttp.send();
    }
}
	};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();
//console.log(cooldown_1);
   



});
});




$(function(){
$("#skill_3").click(() =>{
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        position = PlayerObj.position;
        console.log(position);
        if(position != 0){
 			var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                skill =  JSON.parse(this.responseText);
                damage = skill.damage;
                cooldown3 = skill.cooldown;
                skillName = skill.skillName;
                                ani = skill.ani;
                document.getElementById("topHiti").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/melee.gif';
                   var btn = $("#skill_3");
    btn.prop('disabled',true);
    window.setTimeout(function(){ 
        btn.prop('disabled',false);
    },cooldown3 *1000);
                	if(damage == null){
					}else{
					if(isHost == 1){

					Enemy_health = attack(damage, Enemy_health);
					console.log(Enemy_health);
					console.log(damage); 
				}else{
					var xmlhttp = new XMLHttpRequest();
					        xmlhttp.open("GET", "sendAttack.php?damage=" + damage +"&skill=1", true);
        xmlhttp.send();
				}
						if(Enemy_health <= 0 ){
 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();

	
}else{
document.getElementById("bosshealth").innerHTML = Enemy_health;
}
			var cool1 = setInterval(cooldown1, 1000);
				function cooldown1() {
				document.getElementById("cooldown3").innerHTML = cooldown3;
				  cooldown3 = cooldown3-1;
				  if(cooldown3 <= 0){
				  	cooldown3= 0;
				  	  document.getElementById("cooldown3").innerHTML = 0;
				  clearInterval(cool1);
}
}
}
            }
        };
        xmlhttp.open("GET", "convertAttack.php?skill=3", true);
        xmlhttp.send();
    }
}
	};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();
//console.log(cooldown_1);
   



});
});




$(function(){
$("#skill_4").click(() =>{
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
        position = PlayerObj.position;
        console.log(position);
        if(position != 0){
 			var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                skill =  JSON.parse(this.responseText);
                damage = skill.damage;
                cooldown4 = skill.cooldown;
                skillName = skill.skillName;
                                ani = skill.ani;
                document.getElementById("topHiti").src = 'https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/melee.gif';
                   var btn = $("#skill_4");
    btn.prop('disabled',true);
    window.setTimeout(function(){ 
        btn.prop('disabled',false);
    },cooldown4 *1000);
                	if(damage == null){
					}else{
					if(isHost == 1){

					Enemy_health = attack(damage, Enemy_health);
					console.log(Enemy_health);
					console.log(damage); 
				}else{
					var xmlhttp = new XMLHttpRequest();
					        xmlhttp.open("GET", "sendAttack.php?damage=" + damage +"&skill=1", true);
        xmlhttp.send();
				}
	if(Enemy_health <= 0 ){
 document.getElementById("bossimg").src='https://atdpsites.berkeley.edu/awu/AIC/project%202/assets/death.jpg'; 
 document.getElementById("bosshealth").innerHTML = 0;
  
  var xmlhttp2 = new XMLHttpRequest();
  towerNUMBER = towerNUMBER +1;
  console.log(towerNUMBER);
        xmlhttp2.open("GET", "update_tower.php?rand=13213&tower=" + towerNUMBER, false);
        xmlhttp2.send();
        location.reload();
	}else{
	document.getElementById("bosshealth").innerHTML = Enemy_health;
}
			var cool1 = setInterval(cooldown1, 1000);
				function cooldown1() {
				document.getElementById("cooldown4").innerHTML = cooldown4;
				  cooldown4 = cooldown4-1;
				  if(cooldown4 <= 0){
				  	cooldown4= 0;
				  	  document.getElementById("cooldown4").innerHTML = 0;
				  clearInterval(cool1);
}
}
}
            }
        };
        xmlhttp.open("GET", "convertAttack.php?skill=4", true);
        xmlhttp.send();
    }
}
	};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();
//console.log(cooldown_1);
   



});
});

$("#savequit").click(() =>{
  location.replace("https://atdpsites.berkeley.edu/awu/aic/project%202/savequit.php");
});
$("#quit").click(() =>{
  location.replace("https://atdpsites.berkeley.edu/awu/aic/project%202/quit.php");
});



});
var ownUpdate = setInterval(ownUpdate, 500);
function ownUpdate(){
	var xmlhttp = new XMLHttpRequest();
var player_name ="";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       PlayerObj = JSON.parse(this.responseText);
       // console.log(this.responseText);
        player_name = PlayerObj.name;
        player_health = PlayerObj.health;
        isHost = PlayerObj.isHOST;
        if(player_health <= 0){
        	location.replace("https://atdpsites.berkeley.edu/awu/aic/project%202/gameOver.php");
        }
    }
};
xmlhttp.open("GET", "convert.php", true);
xmlhttp.send();
}




//need a different php page