// addcategorybtnEl=document.querySelector('.add-categories-btn');
// addformcontainerEl=document.querySelector('.add-form-container');
// showcategoriesbtnEl=document.querySelector('.show-categories-btn');
// editcategoryEl=document.querySelectorAll('.edit-category');
// const editformcontainerEl=document.querySelector('.edit-form-container');
// function btnshowhandler(){
//     const formaddEl = addformcontainerEl.querySelector('.form-add');
//
//     if (!formaddEl) {
//         console.log('hi');
//         addformcontainerEl.insertAdjacentHTML(
//             "beforeend",
//             `
//             <form class=" form-add" method="post">
//                 <input name="title" type="text" placeholder="title">
//
//                 <select name="blong">
//                     <option value="" selected disabled>انتخاب کنید</option>
//                     <option value="article">مقاله</option>
//                     <option value="product">محصول</option>
//                 </select>
//
//                 <input name="submit" type="submit">
//             </form>
//         `
//         );
//         return;
//
//     }
//
//
//
//     //addformcontainerEl.classList.toggle('hide');
//
//
//
// }
// addcategorybtnEl.addEventListener('click',btnshowhandler);
//
// function showeditformhndl (){
//     console.log('hi');
//     // const formeditEl=document.querySelector('.edit-add');
//     // if(!formeditEl){
//     //     console.log('hi');
//     //     editformcontainerEl.insertAdjacentHTML("afterbegin",
//     //         `
//     //    <form class=" edit-add" method="post">
//     //             <input name="title" type="text" placeholder="title">
//     //
//     //             <select name="blong">
//     //                 <option value="" selected disabled>انتخاب کنید</option>
//     //                 <option value="article">مقاله</option>
//     //                 <option value="product">محصول</option>
//     //             </select>
//     //
//     //             <input name="submit" type="submit">
//     //         </form>`);
//     //     return;
//     // }
//     // editformcontainerEl.classList.toggle('hide');
//
// }
//
// editcategoryEl.forEach(edit=>{
//     edit.addEventListener('click',showeditformhndl)
// })