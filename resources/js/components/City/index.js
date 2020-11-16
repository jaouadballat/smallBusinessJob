import React from 'react';
import {cities as villes} from "../../cities";
import {valueFromUrlParams} from "../services/helpers";

function City(props) {
    const [cities, setCities] = React.useState([]);
    const [city, setCity] = React.useState(valueFromUrlParams('location') || '');

    const handleSearchCity = e => {
        const value = e.target.value;
        const regx = new RegExp(city, 'gi');
        const result = villes.filter(city => city.ville.match(regx));
        setCities(result);
        setCity(value);
    }

    const handleClick = (city) => {
        setCity(city.ville);
        setCities([]);
        props.onChange(city.ville);
    }

    return (
        <>
            <input type="text" id="city" name="location" placeholder="Job Location" value={city} autoComplete="off" onChange={handleSearchCity} />
            { city.length > 0 && cities.length > 0 && <ul className="list-group" id="cities">
                {
                    cities.map(
                        (city, index) =>
                            <li className="list-group-item" key={index} onClick={() => handleClick(city)}>
                                {city.ville}
                            </li>
                    )
                }
            </ul>
            }
        </>
    );
}

export default City;
