@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20 ">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Landing Page Settings") }}</h4>
                            <div id="tabs-with-content">
                                <div class="tabs">
                                    <ul>
                                        <li><a>Main Information</a></li>
                                        <li><a>Technology Stack</a></li>
                                        <li><a>Portfolio Projects</a></li>
                                        <li><a>Links</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <section class="tab-content">
                                        <div class="field">
                                            <label class="label">Title</label>
                                            <div class="control">
                                                <input class="input" id="mainTitle" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Main text</label>
                                            <div class="control">
                                                <textarea class="textarea" id="mainText" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Sub text</label>
                                            <div class="control">
                                                <textarea class="textarea" id="mainSubText" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <button class="button is-dark" id="mainSave">Save</button>
                                    </section>
                                    <section class="tab-content">
                                        <div  class="table-container">
                                            <table class="table is-striped">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>Picture</td>
                                                        <td>Link</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="stackList">
                                                    <tr id="stackElement-1">
                                                        <td>1</td>
                                                        <td>
                                                            <img src="https://seeklogo.com/images/N/nodejs-logo-D26404F360-seeklogo.com.png" style="height: 50px; width: 50px" alt="">
                                                        </td>
                                                        <td>
                                                            <a href="https://node.js">https://node.js</a>
                                                        </td>
                                                        <td>
                                                            <button class="delete stackDelete" data-id="1"></button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="field">
                                            <label class="label">Link</label>
                                            <div class="control">
                                                <input class="input" id="stackLink" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" type="file" id="stackLogo">
                                                <span class="file-cta">
                                                  <span class="file-icon">
                                                    <i class="fas fa-upload"></i>
                                                  </span>
                                                  <span class="file-label">
                                                    Choose a file…
                                                  </span>
                                                </span>
                                                <span class="file-name">
                                                    No file uploaded
                                                </span>
                                            </label>
                                        </div>
                                        <progress class="progress is-primary is-small margin-top-10" id="stackUploadState" value="0" max="100"></progress>
                                        <button class="button is-dark margin-top-10" id="stackSave">Add</button>

                                        <template id="stackTemplate">
                                            <tr id="stackElement-1">
                                                <td>1</td>
                                                <td>
                                                    <img src="https://seeklogo.com/images/N/nodejs-logo-D26404F360-seeklogo.com.png" style="height: 50px; width: 50px" alt="">
                                                </td>
                                                <td>
                                                    <a href="https://node.js">https://node.js</a>
                                                </td>
                                                <td>
                                                    <button class="delete stackDelete" data-id="1"></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </section>
                                    <section class="tab-content">
                                        <div  class="table-container">
                                            <table class="table is-striped">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>Picture</td>
                                                        <td>Link</td>
                                                        <td>Description</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="portfolioList">
                                                    <tr id="portfolioElement-1">
                                                        <td>1</td>
                                                        <td>
                                                            <img src="https://seeklogo.com/images/N/nodejs-logo-D26404F360-seeklogo.com.png" style="height: 50px; width: 50px" alt="">
                                                        </td>
                                                        <td>
                                                            <a href="https://node.js">https://node.js</a>
                                                        </td>
                                                        <td>
                                                            JHAJKDSHAJKHSUAHSYUIGAHUSHAUIGSYAUIHBSUIAHUSITYAUSHNAOUSHHIATSGYI
                                                        </td>
                                                        <td>
                                                            <button class="delete portfolioDelete" data-id="1"></button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="field">
                                            <label class="label">Name</label>
                                            <div class="control">
                                                <input class="input" id="portfolioName" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Link</label>
                                            <div class="control">
                                                <input class="input" id="portfolioLink" type="text" placeholder="">
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label class="label">Description</label>
                                            <div class="control">
                                                <textarea class="textarea" id="portfolioDescription" placeholder=""></textarea>
                                            </div>
                                        </div>

                                        <div class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" type="file" id="portfolioPreview">
                                                <span class="file-cta">
                                                  <span class="file-icon">
                                                    <i class="fas fa-upload"></i>
                                                  </span>
                                                  <span class="file-label">
                                                    Choose a file…
                                                  </span>
                                                </span>
                                                <span class="file-name">
                                                    No file uploaded
                                                </span>
                                            </label>
                                        </div>
                                        <progress class="progress is-primary is-small margin-top-10" id="stackUploadState" value="0" max="100"></progress>
                                        <button class="button is-dark" id="portfolioSave">Save</button>

                                        <template id="portfolioTemplate">
                                            <tr id="portfolioElement-1">
                                                <td>1</td>
                                                <td>
                                                    <img src="https://seeklogo.com/images/N/nodejs-logo-D26404F360-seeklogo.com.png" style="height: 50px; width: 50px" alt="">
                                                </td>
                                                <td>
                                                    <a href="https://node.js">https://node.js</a>
                                                </td>
                                                <td>
                                                    JHAJKDSHAJKHSUAHSYUIGAHUSHAUIGSYAUIHBSUIAHUSITYAUSHNAOUSHHIATSGYI
                                                </td>
                                                <td>
                                                    <button class="delete portfolioDelete" data-id="1"></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </section>
                                    <section class="tab-content">
                                        <div  class="table-container">
                                            <table class="table is-striped">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>Name</td>
                                                        <td>Link</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="linkList">
                                                    <tr id="linkElement-1">
                                                        <td>1</td>
                                                        <td>
                                                            GitHub
                                                        </td>
                                                        <td>
                                                            <a href="https://node.js">https://node.js</a>
                                                        </td>
                                                        <td>
                                                            <button class="delete linkDelete" data-id="1"></button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="field">
                                            <label class="label">Name</label>
                                            <div class="control">
                                                <input class="input" id="linkName" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Link</label>
                                            <div class="control">
                                                <input class="input" id="linkLink" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <button class="button is-dark" id="linkSave">Save</button>

                                        <template id="linksTemplate">
                                            <tr id="linkElement-1">
                                                <td>1</td>
                                                <td>
                                                    GitHub
                                                </td>
                                                <td>
                                                    <a href="https://node.js">https://node.js</a>
                                                </td>
                                                <td>
                                                    <button class="delete linkDelete" data-id="1"></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
