<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title p-4">
                    <h4>Select Languages</h4>
                </div>
                <div class="card-body" style="margin-top: -40px;">
                    <?php if (isset($languages) && is_array($languages)): ?>
                        <form>
                            <?php foreach ($languages as $language): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        value="<?php echo htmlspecialchars($language['language_id']); ?>"
                                        id="language_<?php echo htmlspecialchars($language['language_id']); ?>">
                                    <label class="form-check-label"
                                        for="language_<?php echo htmlspecialchars($language['language_id']); ?>">
                                        <?php echo htmlspecialchars($language['language_name']); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <div class="action mt-4 ml-auto">
                                <button type="button" class="btn btn-primary">Next</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p>No languages found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>