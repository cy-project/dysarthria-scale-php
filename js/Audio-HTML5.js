<!-- HTML5 AUDIO CODE WITH FALLBACK

//http://allwebco-templates.com/support/S_script_music.htm

// PLAYER VARIABLES
function wav(){

var wavclasslength=$(".wavclass").length;


var oggsnd 	= "audio-file.ogg";	// OGG FILE


var loopsong	= "no"			// LOOP MUSIC | yes | no |
var autostarts	= "no"			// AUTO START MUSIC | yes | no |


var audiowidth	= "280"			// WIDTH OF PLAYER
var borderw	= "0"			// BORDER WIDTH AROUND PLAYER
var bordcolor	= "0066FF"		// BORDER COLOR
var centerp	= "no"			// CENTER PLAYER | yes | no |


// -----------------------------------------------
// Created by: Allwebco Design Corporation
// No License is included. This script can be freely copied, distributed or sold
// YOU DO NOT NEED TO EDIT BELOW THIS LINE

   if (loopsong == "yes") {
var looping5="loop";
var loopingE="true";
	}
	else{
var looping5="";
var loopingE="false";
	}
   if (autostarts == "yes") {
var h5auto="autoplay";
var h4auto="1";
	}
	else{
var h5auto="";
var h4auto="0";
	}
   if (centerp == "yes") {
var centerply="auto";
	}
	else{
var centerply="0";
	}


for (i=1; i<=wavclasslength; i++)
{	
	var stringwav="";
	var mp3snd=$('#wavget-'+i).val();
	
	if (centerp == "yes") {
				stringwav+='<center>';
		}
				stringwav+='<table style="border-collapse:collapse; border-spacing: 0px; margin: '+centerply+'; padding: 0px; border: #'+bordcolor+' '+borderw+'px solid;"><tr><td style="vertical-align: middle; text-align: center; padding: 0px;">';
				stringwav+='<audio '+h5auto+' controls '+looping5+' style="width:'+audiowidth+'px;">';
				stringwav+='<source src="'+mp3snd+'" type="audio/mpeg">';
				stringwav+='<source src="'+oggsnd+'" type="audio/ogg">';
				stringwav+='<object classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" type="application/x-mplayer2" width="'+audiowidth+'" height="45">';
				stringwav+='<param name="filename" value="'+mp3snd+'">';
				stringwav+='<param name="autostart" value="'+h4auto+'">';
				stringwav+='<param name="loop" value="'+loopingE+'">';
				stringwav+='</object>';
				stringwav+='</audio>';
				stringwav+='</td></tr></table>';
				
		if (centerp == "yes") {
				stringwav+='</center>';
		}

		$('#wavshow-'+i).html(stringwav);
	}
   
	
}
// -->