"use client";

export default function Error({
  error,
  reset,
}) {

  return (
    <div>

      <p>Error al cargar</p>

      <button onClick={() => reset()}>
        Reintentar
      </button>

    </div>
  );
}