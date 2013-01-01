<?php
	/*
		Copyright (c) 2013 Matt Walton
		Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), 
		to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
		and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
		The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.	
		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
		IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, 
		ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
	*/
	
	function SteamID64ToSteamID($sid) {
		$authserver = bcsub($sid, '76561197960265728') & 1;
		$authid = (bcsub($sid, '76561197960265728')-$authserver)/2;
		return "STEAM_0:$authserver:$authid";
	}
	
	class steamAPI {
		private $sid64;
		private $fm;
		private $skey;
		
		function __construct($key, $sid, $format) {
			if (!$sid) {
				die("No SteamID64 Set in new steamAPI method");
			} elseif(!$key) {
				die("No Steam API key set in new steamAPI method");
			} elseif (!$format) {
				$this->format = "xml";
			}
			$this->sid64 = $sid;
			$this->fm = $format;
			$this->skey = $key;
			$this->getProfile();
		}
		
		function getProfile() {
			$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$this->skey}&steamids={$this->sid64}&format={$this->fm}";
			$data = file_get_contents($url);
			$pdata;
			
			if ($this->fm == "xml") {
				$pdata = new SimpleXMLElement($data);
				$pdata = $pdata->players->player;
			} elseif ($this->fm  == "json") {
				$pdata = json_decode($data);
				$pdata = $pdata->response->players[0];
			}
			
			$this->SteamID64= (string) $pdata->steamid;
			$this->ProfileName = (string) $pdata->personaname;
			
			$this->Status = (string) $pdata->profilestate;
			
			$this->AvatarSmall = (string) $pdata->avatar;
			$this->AvatarMedium = (string) $pdata->avatarmedium;
			$this->AvatarLarge = (string) $pdata->avatarfull;	
		}
		
		function GetSteamID64() {
			return $this->SteamID64;
		}
		
		function GetProfileName() {
			return $this->ProfileName;
		}
		
		function GetStatus() {
			return $this->Status;
		}
		
		function GetAvatarSmall() {
			return $this->AvatarSmall;
		}
		
		function GetAvatarMedium() {
			return $this->AvatarMedium;
		}
			
		function GetAvatarLarge() {
			return $this->AvatarLarge;
		}
		
		function GetSteamID() {
			return SteamID64ToSteamID($this->SteamID64);
		}
	}
	
?>
			
