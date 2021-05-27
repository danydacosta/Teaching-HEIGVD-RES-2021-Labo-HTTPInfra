$(function() {

        var animalsSrc = ['/ocean/', '/desert/'];
        function loadAnimals() {
                var randomSrc = animalsSrc[Math.floor(Math.random() * animalsSrc.length)]; // Get one random animal source
                $.getJSON("/api/students" + randomSrc, function(rdmAnimal) {
                        console.log(rdmAnimal);
                        var message = "No animal here...";

                        if (rdmAnimal.length > 0) {
                                message = "I am a " + rdmAnimal[0].animal + " from " + rdmAnimal[0].country;
                        }
                        $("#dynamicAnimal").text(message);
                });
        };

        loadAnimals();
        setInterval(loadAnimals, 2000);

});
