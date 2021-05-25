var Chance = require('chance');
var chance = new Chance();

const express = require('express')
const app = express()
const port = 3000

app.get('/ocean', (req, res) => {
  res.send(generateAnimalsBasedOnType("ocean"))
})

app.get('/desert', (req, res) => {
    res.send(generateAnimalsBasedOnType("desert"))
})
  
app.get('/', (req, res) => {
    res.send("Either use /ocean or /desert")
})

app.listen(port, () => {
  console.log(`Accepting HTTP requests on port ${port}`)
})

function generateAnimalsBasedOnType(type) {
    var numberOfAnimals = chance.integer({
        min: 1,
        max: 10
    });

    var animals = [];

    for(var i = 0; i < numberOfAnimals; i++) {
        animals.push({
            animal: chance.animal({type: type}),
            country: chance.country({ full: true })
        })
    }

    return animals;
}