import { create } from "zustand";

export const useCartStore =
create((set) => ({

  cart: [],

  addItem: (product: { id: number }) =>
    set(state => ({
      cart: [
        ...state.cart,
        product
      ]
    })),

  removeItem: (id: number) =>
    set(state => ({
      cart:
      state.cart.filter(
        item => item.id !== id
      )
    }))
}));