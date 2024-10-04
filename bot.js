// ==UserScript==
// @name         Bot
// @namespace    http://tampermonkey.net/
// @version      1.0
// @description  Bot for google
// @author       Evgeniy Titov
// @match        https://www.google.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let input = document.getElementsByName("q")[0];
let links = document.links;
let searchBtn = document.getElementsByName("btnK")[0];



if (searchBtn !== undefined) {
  input.value = "10 самых популярных шрифтов от Google";
  searchBtn.click()
} else {
  for (let i = 0; i<links.length; i++) {
    if (links[i].href.indexOf('napli.ru') != -1) {
      console.log("Нашел строку " + links[i])
    }
  }
}
