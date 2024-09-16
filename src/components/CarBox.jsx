import { useState } from "react";

function CarBox({ data, carID }) {
  const [carLoad, setCarLoad] = useState(true);
  const car = data[carID];

  // If car data is not available, return null
  if (!car) return null;
  const image = car.images && car.images.length > 0 ? car.images[0] : null;
  return (
    <div className="box-cars">
      {/* car */}
      <div className="pick-car">
{/*         {car.images.map((image, index) => (
          <img
            key={index}
            style={{ display: carLoad ? "none" : "block" }}
            src={image.image_path}
            alt={`car_img_${index}`}
            onLoad={() => setCarLoad(false)}
          />
        ))} */}
                
          <img
            style={{ display: carLoad ? "none" : "block" }}
            src={image.image_path}
            alt={`car_img_}`}
            onLoad={() => setCarLoad(false)}
          />
        
        {carLoad && <span className="loader"></span>}
      </div>
      {/* description */}
      <div className="pick-description">
        <div className="pick-description__price">
          <span>${car.Price_per_day}</span>/ rent per day
        </div>
        <div className="pick-description__table">
          <div className="pick-description__table__col">
            <span>Model</span>
            <span>{car.Model}</span>
          </div>

          <div className="pick-description__table__col">
            <span>Mark</span>
            <span>{car.Name}</span>
          </div>

          <div className="pick-description__table__col">
            <span>Year</span>
            <span>{car.Year}</span>
          </div>

          <div className="pick-description__table__col">
            <span>Doors</span>
            <span>{car.Doors}</span>
          </div>

          <div className="pick-description__table__col">
            <span>AC</span>
            <span>{car.AC}</span>
          </div>

          <div className="pick-description__table__col">
            <span>Transmission</span>
            <span>{car.Transmission}</span>
          </div>

          <div className="pick-description__table__col">
            <span>Fuel</span>
            <span>{car.Fuel}</span>
          </div>
        </div>
        {/* btn cta */}
        <a className="cta-btn" href="#booking-section">
          Reserve Now
        </a>
      </div>
    </div>
  );
}

export default CarBox;
