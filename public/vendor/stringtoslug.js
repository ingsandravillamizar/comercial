function stringToSlug(e,t,n="-"){const o=document.getElementById(`${e}`);o.addEventListener("keydown",()=>toLower(o.value,t,n)),o.addEventListener("keypress",()=>toLower(o.value,t,n)),o.addEventListener("keyup",()=>toLower(o.value,t,n)),o.addEventListener("blur",()=>toLower(o.value,t,n))}function toLower(e,t,n){let o=e.toLowerCase().trim();o=o.replaceAll(" ",`${n}`),document.getElementById(`${t}`).value=o}