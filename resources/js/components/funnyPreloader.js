import Preloader from "./preloader";

export default class FunnyPreloader extends Preloader
{
    getLoaderCode()
    {
        return `
            <style>
                .funny_preload {
                    animation: angry 2s infinite cubic-bezier(0.77, 0.02, 0.79, 0.76);
                }
                .tada_animation_infinity {
                    animation: tada 2s infinite;
                }

                @keyframes angry {
                    from {
                        color: inherit;
                    }
                    to {
                        color: #ff0000;
                        font-size: 4.4em
                        ;
                    }
                }
            </style>
            <span class="icon is-large tada_animation_infinity">
                <i class="fas fa-angry fa-3x funny_preload"></i>
            </span>
        `;
    }

}
