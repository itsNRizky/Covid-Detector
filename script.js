    // fetch(`https://jsonplaceholder.typicode.com/users`)
    //   .then(function (response) {
    //     return response.json()
    //   })
    //   .then(function (data) {
    //     console.log('the data', data)
    //   })

    let headers = new Headers();

    headers.append('Content-Type', 'application/json');
    headers.append('Accept', 'application/json');

    headers.append('Access-Control-Allow-Origin', 'http://localhost:5000');
    headers.append('Access-Control-Allow-Credentials', 'true');

    headers.append('GET', 'POST', 'OPTIONS');

    let newPost = {
        "Breathing Problem": 0,
        "Fever": 0,
        "Dry Cough": 0,
        "Sore throat": 0,
        "Running Nose": 0,
        "Asthma": 0,
        "Chronic Lung Disease": 1,
        "Headache": 0,
        "Heart Disease": 1,
        "Diabetes": 1,
        "Hyper Tension": 1,
        "Fatigue ": 0,
        "Gastrointestinal ": 0,
        "Abroad travel": 1,
        "Contact with COVID Patient": 1,
        "Attended Large Gathering": 1,
        "Visited Public Exposed Places": 0,
        "Family working in Public Exposed Places": 0,
        "Wearing Masks": 1,
        "Sanitization from Market": 0
    }

    fetch(`http://127.0.0.1:5000/predict`, {
            method: 'post',
            mode: 'cors',
            headers: headers,
            body: JSON.stringify(newPost)
        }).then(function(response) {
            return response.json()
        })
        .then(function(data) {
            console.log('post request response data', data)
        })