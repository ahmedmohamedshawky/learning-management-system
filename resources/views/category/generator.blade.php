
    <!-- Generator Section -->
    <section class="generator-section">
        <div class="container">
            <div class="generator-form-container">
                <form action="{{ route('playlists.generate') }}" method="POST">
                    @method("POST")
                    @csrf
                    <div class="form-row-flex">
                        <div class="textarea-wrapper">
                            <label for="content" class="form-label">ادخل التصنيفات (كل تصنيف في سطر جديد)</label>
                            <textarea placeholder="programming
marketing
design" name="category_name"></textarea>
                        </div>
                        <div class="buttons-wrapper">
                            <button type="submit" class="btn-generate">Generate</button>
                            <button type="button" class="btn-do-nothing">Do Nothing</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>




