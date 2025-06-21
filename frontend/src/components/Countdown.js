import React, { useEffect, useState } from 'react';

function Countdown() {
  const [time, setTime] = useState(10);

  useEffect(() => {
    if (time <= 0) return;

    const timer = setInterval(() => {
      setTime((prev) => prev - 1);
    }, 1000);

    return () => clearInterval(timer);
  }, [time]);

  return (
    <div className="countdown">
      {time > 0 ? <h3>Contagem: {time}</h3> : <h3>Tempo esgotado!</h3>}
    </div>
  );
}

export default Countdown;
