export default function CartTable() {
    const columnTable = document.createElement('div');
    columnTable.className = 'columnContainer';
    columnTable.innerHTML =
    `
<table class="table">
  <thead class="table-dark">
  <tr>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
  </tr>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
  <th scope="col">primeiro</th>
    ...
  </thead>
  <p> oi </p>
  <tbody>
    ...
  </tbody>
</table>
    `
    return columnTable;
}
