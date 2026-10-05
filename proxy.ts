import { NextRequest, NextResponse } from "next/server";

export function proxy(request: NextRequest) {

  const token = request.cookies.get("token");

  const pathname = request.nextUrl.pathname;

  if (
    pathname === "/login" ||
    pathname === "/register"
  ) {
    return NextResponse.next();
  }

  if (!token) {
    return NextResponse.redirect(
      new URL("/login", request.url)
    );
  }

  return NextResponse.next();
}