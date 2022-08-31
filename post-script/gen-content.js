// node gen-content.js

//// Core modules
// const path = require('path');
const path = require('path');
const fs = require('fs');

//// External modules
const lodash = require('lodash');

//// Modules


function titleCase(str) {
    var splitStr = str.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        // You do not need to check if i is larger than splitStr length, as your for does that for you
        // Assign it back to the array
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
    }
    // Directly return the joined string
    return splitStr.join(' ');
}

; (async () => {
    try {
        var args = process.argv.slice(2)

        const directoryPath = args[0] // "D:/files/GSC/CJP/Himal-Us/Vol. 9 No. 1 June 2017";

        let content = fs.readFileSync(path.join(directoryPath, 'titles.csv'), { encoding: 'utf8' })
        let rows = content.split(/\r?\n/)

        let output = '';

        rows.forEach(function (row, i) {

            let split = row.split('||')
            let title = split[0]
            let authors = split[1]

            title = lodash.trim(title)
            title = title.replace(/\s\s+/g, ' ') // Remove extra space
            title = title.replace(/^([0-9])+ /, '') // Remove index numbering
            title = title.replace(/\.pdf$/, '') // Remove file ext .pdf
            title = titleCase(title) // Rename to start case

            authors = lodash.trim(authors)
            authors = authors.replace(/\s\s+/g, ' ') // Remove extra space

            output += `
    <div class="mb-4">
        <h2 class="h3 mb-1"><a href="xxx">${title}</a></h2>
        <p class="pl-4 font-italic">${authors}</p>
    </div>
`
        });
        output = `<h2 class="h2 mb-4 text-center text-md-left">Articles</h2>
<div class="articles pl-0 pl-md-5">
    ${output}
</div>`

        fs.writeFileSync(path.join(directoryPath, 'output.html'), output, { encoding: 'utf8' })

    } catch (err) {
        console.log(err)
    } finally {
    }
})()