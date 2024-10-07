// ==UserScript==
// @name         Bot
// @namespace    http://tampermonkey.net/
// @version      1.0
// @description  Bot for google
// @author       Evgeniy Titov
// @match        https://www.google.com/*
// @match        https://www.napli.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let input = document.getElementsByName("q")[0];
let links = document.links;
let searchBtn = document.getElementsByName("btnK")[0];
let keywords = ["вывод произвольных полей wordpress", "10 самых популярных шрифтов от Google", "отключение редакций и ревизий в WordPress"];
let keyword = keywords[getRandom(0, keywords.length)];


//Работает на главное странице поисковика
if (searchBtn !== undefined) {

  let i = 0;
  let timerId = setInterval(function() {
    input.value += keyword[i]
    i++;
    if (i == keyword.length ) {
      clearInterval(timerId);
      searchBtn.click();
    }
  },300)

  } else if (location.hostname == "napli.ru") {
    console.log("Мы на целевом сайте");
  }
//Работаем на странице поисковой выдачи
else {
  let nextPage = true;
  for (let i = 0; i<links.length; i++) {
    if (links[i].href.indexOf('napli.ru') != -1) {
      let link = links[i];
      nextPage = false;
      console.log("Нашел строку " + link);
      setTimeout(()=>{
        link.click();
      }, getRandom(2000, 4000));
      break;
    }
  }
  if (document.querySelector(".YyVfkd").innerText == "5") {
    nextPage = false;
    location.href="https://www.google.com/";
  }
  if (nextPage) {
    setTimeout(()=>{
      pnnext.click();
    }, getRandom(2500, 4000))

  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min)
}
