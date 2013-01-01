Copyright (c) 2013 Matt Walton

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

example uses:
	$profile = new steamAPI(STEAMAPIKEY, STEAMID64, FORMAT("xml"/"json"))

functions:

	$profile->GetSteamID64(); - Returns the 64 bit steamid
	$profile->GetProfileName(); - Returns the profile name.
	$profile->GetStatus(); - Returns the online status of a player
	$profile->GetAvatarSmall(); -  Returns a 32x32px avatar.
	$profile->GetAvatarMedium(); - Returns a 64x64px avatar.
	$profile->GetAvatarLarge(); - Returns a 184x184px avatar.
	$profile->GetSteamID(); - Returns a normal 32bit steamid.

	SteamIDToSteamID64($steamid) - Converts SteamID64 (community ID) to a normal SteamID used in-game.

