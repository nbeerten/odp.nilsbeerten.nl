document.getElementById("odpsubmit").onclick = function () 
    {   
        const odperror = document.getElementById('odperror');
        const odpinput = document.getElementById('odpinput').value;
        const regex = /([0-9]{17,18})/g;
        if(odpinput !== "" && regex.test(odpinput)) {
            location.href = `https://odp.nilsbeerten.nl/${odpinput}/`;
        } else {
            odperror.textContent = 'Invalid ID';
        }
    };