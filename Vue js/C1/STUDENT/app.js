let goal = document.getElementById("goal");
let btn = document.querySelector('button');
btn.addEventListener('click', () => {
    let ulItem = document.querySelector('ul');
    let li = document.createElement('li');
    li.textContent = goal.value;
    ulItem.appendChild(li);
});