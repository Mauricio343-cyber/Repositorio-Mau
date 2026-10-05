const API_URL =
  process.env.NEXT_PUBLIC_API_URL ||
  "http://localhost:8000/api";

export async function fetchProducts() {

}

export async function fetchProduct(id:number) {

}
//usuario maumur@gmail.com//

// contraHoliwis123 //

export interface User {
  id: number;
  name: string;
  email: string;
}

export interface Product {
  id: number;
  name: string;
  description: string;
  price: number;
  stock: number;
  image?: string;
}

export interface Order {
  id: number;
  total: number;
  status: string;
  created_at: string;
}

export interface AuthResponse {
  message: string;
  token: string;
  user: User;
}

export function getErrorMessage(
  error: unknown
): string {

  if (error instanceof Error) {
    return error.message;
  }

  return String(error);
}