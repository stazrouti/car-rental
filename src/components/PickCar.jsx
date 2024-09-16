import { useState, useEffect } from "react";
import axios from "axios";
import CarBox from "./CarBox";

function PickCar() {
  const [activeCarId, setActiveCarId] = useState(null);
  const [colorBtn, setColorBtn] = useState("");
  const [cars, setCars] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  // Fetch cars data from the API
  useEffect(() => {
    const fetchCars = async () => {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/cars/");
        
        // Log the response data for debugging
        console.log("API Response:", response.data);

        // Use the response data directly as it's an array of cars
        if (Array.isArray(response.data)) {
          // Limit the number of cars to 6
          const limitedCars = response.data.slice(0, 6);
          setCars(limitedCars);

          // Set the first car as active initially if available
          if (limitedCars.length > 0) {
            setActiveCarId(limitedCars[0].id); // Use the car ID from the fetched data
            setColorBtn("btn1"); // Set the first button as active
          }
        } else {
          throw new Error("Unexpected response structure");
        }

        setLoading(false);
      } catch (err) {
        setError(err);
        setLoading(false);
      }
    };

    fetchCars();
  }, []);

  const btnID = (id) => {
    setColorBtn(colorBtn === id ? "" : id);
  };

  const coloringButton = (id) => {
    return colorBtn === id ? "colored-button" : "";
  };

  // Handle loading and error states
  if (loading) return <div>Loading cars...</div>;
  if (error) return <div>Error fetching data: {error.message}</div>;

  // Find the index of the car based on the ID
  const getCarIndex = (id) => {
    return cars.findIndex(car => car.id === id);
  };

  return (
    <>
      <section className="pick-section">
        <div className="container">
          <div className="pick-container">
            <div className="pick-container__title">
              <h3>Vehicle Models</h3>
              <h2>Our rental fleet</h2>
              <p>
                Choose from a variety of our amazing vehicles to rent for your
                next adventure or business trip
              </p>
            </div>
            <div className="pick-container__car-content">
              {/* pick car */}
              <div className="pick-box">
                {cars.map((car, index) => (
                  <button
                    key={car.id}
                    className={`${coloringButton(`btn${index + 1}`)}`}
                    onClick={() => {
                      setActiveCarId(car.id);
                      btnID(`btn${index + 1}`);
                    }}
                  >
                    {car.Name} {/* Use the Name field from fetched data */}
                  </button>
                ))}
              </div>

              {/* Pass fetched cars data to CarBox */}
              {activeCarId !== null && (
                <CarBox data={cars} carID={getCarIndex(activeCarId)} />
              )}
            </div>
          </div>
        </div>
      </section>
    </>
  );
}

export default PickCar;
