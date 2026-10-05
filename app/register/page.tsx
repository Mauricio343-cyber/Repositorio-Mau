async function register(formData: FormData) {
  "use server";

  const name = formData.get("name");
  const email = formData.get("email");
  const password = formData.get("password");

  console.log({ name, email, password });
}

export default function RegisterPage() {
  return (
    <div>
      <h1>Registro</h1>

      <form action={register}>
        <input
          type="text"
          name="name"
          placeholder="Nombre"
          required
        />

        <input
          type="email"
          name="email"
          placeholder="Correo"
          required
        />

        <input
          type="password"
          name="password"
          placeholder="Contraseña"
          required
        />

        <button type="submit">
          Registrarse
        </button>
      </form>
    </div>
  );
}