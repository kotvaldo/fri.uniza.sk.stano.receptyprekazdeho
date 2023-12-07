const profilesData = [
    {id: 1, login: "user1", email: "user1@gmail.com", password: "a", picture: "null"},
    {id: 2, login: "user2", email: "user2@gmail.com", password: "a", picture: "null"},
    {id: 3, login: "user3", email: "user3@gmail.com", password: "a", picture: "null"},
    {id: 4, login: "user4", email: "user4@gmail.com", password: "a", picture: "null"},
    {id: 5, login: "user5", email: "user5@gmail.com", password: "a", picture: "null"},
    {id: 6, login: "user6", email: "user6@gmail.com", password: "a", picture: "null"},
];

const tableContainer = document.getElementById('.table-container');
const table = document.createElement('table');
table.className = 'table';
const headerRow = table.createTHead().insertRow();

for (const key in profilesData[0]) {
    const th = document.createElement('th');
    th.appendChild(document.createTextNode(key));
    headerRow.appendChild(th);
}

profilesData.forEach(profile => {
    const row = table.insertRow();
    for (const key in profile) {
        const cell = row.insertCell();
        cell.appendChild(document.createTextNode(profile[key]));
    }
});

tableContainer.appendChild(table);