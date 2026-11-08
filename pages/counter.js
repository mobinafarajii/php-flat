negativebtnEl=document.querySelector('.Negative');
plusbtnEl=document.querySelector('.plus');
numbercountEl=document.querySelector('.number-count');
const countnumEl=document.querySelector('#countnum');

function plushndl(e){
    e.preventDefault();
    numbercountEl.textContent++;
    countnumEl.value= numbercountEl.textContent;
}
function minushndl(e){
    e.preventDefault();
  if(numbercountEl.textContent>=2){
      numbercountEl.textContent--;
  }
    countnumEl.value= numbercountEl.textContent;

}

plusbtnEl.addEventListener('click',plushndl);
negativebtnEl.addEventListener('click',minushndl);
