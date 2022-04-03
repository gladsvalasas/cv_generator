<template id="baseCardTemplate">
    <div id="card-element-template">
        <hr>
        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column">
                        <span class="title is-5 mainInfo"></span>
                    </div>
                    <div class="column">
                        <span class="subtitle is-5 right submainInfo"></span>
                    </div>
                </div>
                <div class="columns">
                    <siv class="column">
                        <span class="subtitle is-6 dateInfo"></span>
                        <span class="icon is-small delimiter-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="subtitle is-6 otherInfo"></span>
                    </siv>
                </div>
            </div>
            <div class="column is-1">
            <span class="right">
                <button class="delete deleteCard" data-id=""></button>
            </span>
            </div>
        </div>
    </div>
</template>
