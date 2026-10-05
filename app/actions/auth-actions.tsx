
"use server";

import { cookies } from "next/headers";
import { 
    redirect } from "next/navigation";

export async function registerAction(formData: FormData) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/register`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      name: formData.get("name"),
      email: formData.get("email"),
      password: formData.get("password"),
    }),
  });

  if (!response.ok) {
    const errorData = await response.json().catch(() => ({}));
    throw new Error(errorData.message ?? "Error al registrar usuario");
  }

  redirect("/login");
}
``
export async function loginAction(formData: FormData) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/login`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      email: formData.get("email"),
      password: formData.get("password"),
    }),
  });

  if (!response.ok) {
    const errorData = await response.json().catch(() => ({}));
    throw new Error(errorData.message ?? "Error al iniciar sesión");
  }

  const data = await response.json();
  const cookieStore = await cookies();

  cookieStore.set("token", data.token, {
    httpOnly: true,
    secure: process.env.NODE_ENV === "production",
    sameSite: "lax",
    path: "/",
  });

  redirect("http://localhost:3000/api/products");
}

export async function logoutAction() {
  const cookieStore = await cookies();
  cookieStore.delete("token");
  redirect("/login");
}
