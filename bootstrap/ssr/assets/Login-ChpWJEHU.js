import { unref, withCtx, createTextVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderAttr, ssrIncludeBooleanAttr, ssrLooseContain } from "vue/server-renderer";
import { useForm, Head, Link } from "@inertiajs/vue3";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-1tPrXgE0.js";
const _sfc_main = {
  __name: "Login",
  __ssrInlineRender: true,
  props: {
    canResetPassword: {
      type: Boolean
    },
    status: {
      type: String
    }
  },
  setup(__props) {
    const form = useForm({
      email: "",
      password: "",
      remember: false
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "Login | Datta Able Dashboard Template" }, null, _parent));
      _push(`<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet" data-v-b17ac07e><div class="min-h-screen bg-gray-50" data-v-b17ac07e>`);
      if (unref(form).processing) {
        _push(`<div class="fixed inset-0 bg-white z-50 flex items-center justify-center" data-v-b17ac07e><div class="w-full h-1 bg-gray-200 absolute top-0" data-v-b17ac07e><div class="h-full bg-blue-500 animate-pulse" data-v-b17ac07e></div></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="auth-main relative" data-v-b17ac07e><div class="auth-wrapper flex items-center w-full min-h-screen" data-v-b17ac07e><div class="auth-form flex items-center justify-center flex-1 min-h-screen relative p-6" data-v-b17ac07e><div class="w-full max-w-sm relative" data-v-b17ac07e><div class="auth-bg absolute inset-0 pointer-events-none" data-v-b17ac07e><span class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-blue-50 opacity-50 animate-pulse" data-v-b17ac07e></span><span class="absolute top-36 -right-36 w-5 h-5 rounded-full bg-blue-500 animate-bounce" data-v-b17ac07e></span><span class="absolute -left-36 bottom-36 w-5 h-5 rounded-full bg-blue-50 animate-bounce delay-75" data-v-b17ac07e></span><span class="absolute -left-24 -bottom-24 w-72 h-72 rounded-full bg-blue-100 opacity-30 animate-pulse delay-150" data-v-b17ac07e></span></div><div class="bg-white rounded-lg shadow-lg border border-gray-100 relative z-10" data-v-b17ac07e><div class="p-10" data-v-b17ac07e><div class="text-center mb-8" data-v-b17ac07e><div class="mx-auto w-32 h-12 bg-gray-800 rounded flex items-center justify-center" data-v-b17ac07e><img src="/assets/images/footpoweracademy-removebg.png" alt="Logo FootPowerAcademy" class="h-8 w-auto" data-v-b17ac07e></div></div><h4 class="text-center text-xl font-medium mb-6 text-gray-900" data-v-b17ac07e> Login </h4>`);
      if (__props.status) {
        _push(`<div class="mb-4 p-3 text-sm font-medium text-green-700 bg-green-50 border border-green-200 rounded-md" data-v-b17ac07e>${ssrInterpolate(__props.status)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<form class="space-y-4" data-v-b17ac07e><div data-v-b17ac07e><input type="email"${ssrRenderAttr("value", unref(form).email)} class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="Email Address" required autofocus autocomplete="username" data-v-b17ac07e>`);
      if (unref(form).errors.email) {
        _push(`<div class="mt-1 text-sm text-red-600" data-v-b17ac07e>${ssrInterpolate(unref(form).errors.email)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div data-v-b17ac07e><input type="password"${ssrRenderAttr("value", unref(form).password)} class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" placeholder="Password" required autocomplete="current-password" data-v-b17ac07e>`);
      if (unref(form).errors.password) {
        _push(`<div class="mt-1 text-sm text-red-600" data-v-b17ac07e>${ssrInterpolate(unref(form).errors.password)}</div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="flex items-center justify-between flex-wrap gap-2" data-v-b17ac07e><label class="flex items-center" data-v-b17ac07e><input type="checkbox"${ssrIncludeBooleanAttr(Array.isArray(unref(form).remember) ? ssrLooseContain(unref(form).remember, null) : unref(form).remember) ? " checked" : ""} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" data-v-b17ac07e><span class="ml-2 text-sm text-gray-600" data-v-b17ac07e>Remember me?</span></label>`);
      if (__props.canResetPassword) {
        _push(ssrRenderComponent(unref(Link), {
          href: _ctx.route("password.request"),
          class: "text-sm text-blue-600 hover:text-blue-800 font-medium"
        }, {
          default: withCtx((_, _push2, _parent2, _scopeId) => {
            if (_push2) {
              _push2(` Forgot Password? `);
            } else {
              return [
                createTextVNode(" Forgot Password? ")
              ];
            }
          }),
          _: 1
        }, _parent));
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="mt-6" data-v-b17ac07e><button type="submit"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""} class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-medium py-3 px-4 rounded-md transition-colors duration-200 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" data-v-b17ac07e>`);
      if (unref(form).processing) {
        _push(`<span class="inline-flex items-center" data-v-b17ac07e><svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" data-v-b17ac07e><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" data-v-b17ac07e></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" data-v-b17ac07e></path></svg> Logging in... </span>`);
      } else {
        _push(`<span data-v-b17ac07e>Login</span>`);
      }
      _push(`</button></div><div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-100" data-v-b17ac07e><span class="text-sm text-gray-600" data-v-b17ac07e>Don&#39;t have an Account?</span>`);
      _push(ssrRenderComponent(unref(Link), {
        href: _ctx.route("register"),
        class: "text-sm text-blue-600 hover:text-blue-800 font-medium"
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Create Account `);
          } else {
            return [
              createTextVNode(" Create Account ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></form></div></div></div></div></div></div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Auth/Login.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Login = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-b17ac07e"]]);
export {
  Login as default
};
