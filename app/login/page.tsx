

import { loginAction } from "../actions/auth-actions";

export default function LoginPage() {
  return (
    <div>
      <h1>Iniciar Sesión</h1>

      <form action={loginAction}>
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
          Ingresar
        </button>
      </form>

      <a href="/register">
        Crear cuenta
      </a>
    </div>
  );
}
