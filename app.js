console.log("DATA")

const getWeatherData = async () => {
    const response = await fetch("weather.php");
    const data = await response.data;
    return data;
}

const data = getWeatherData().then(data => data);

console.log(data);
