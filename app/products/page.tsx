import { Key, ReactElement, JSXElementConstructor, ReactNode, ReactPortal } from "react";


async function getProducts() {
  const response = await fetch(
    "http://localhost:3000/api/products"
  );

  return response.json();
}

export default async function ProductsPage() {

  const products = await getProducts();

  return (
    <>
      {products.map((product: { id: Key | null | undefined; name: string | number | bigint | boolean | ReactElement<unknown, string | JSXElementConstructor<any>> | Iterable<ReactNode> | ReactPortal | Promise<string | number | bigint | boolean | ReactPortal | ReactElement<unknown, string | JSXElementConstructor<any>> | Iterable<ReactNode> | null | undefined> | null | undefined; }) => (
        <div key={product.id}>
          {product.name}
        </div>
      ))}
    </>
  );
}
