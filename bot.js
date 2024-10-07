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
let keywords = ["вывод произвольных полей wordpress", "10 самых популярных шрифтов от Google", "отклюяен ие редакций и ревизий в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];



if (searchBtn !== undefined) {
  input.value = keyword;
  searchBtn.click()
} else {
  for (let i = 0; i<links.length; i++) {
    if (links[i].href.indexOf('napli.ru') != -1) {
      let link = links[i];
      console.log("Нашел строку " + links[i]);
      //link.click();
      break;
    }
  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
