// node title.js

//// Core modules

//// External modules

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

        const text = args[0]
        console.log(titleCase(text))

    } catch (err) {
        console.log(err)
    } finally {
    }
})()