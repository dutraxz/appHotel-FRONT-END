export default function Column() {
    const column = document.createElement('div');
    column.className = 'column Container';
    column.innerHTML =
    `
<div class="container text-center">
  <div class="row">
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
    `
    return column;
}
