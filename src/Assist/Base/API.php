<?php namespace Github\Assist\Base;

/**
 * ----------------------------------------------------------------------------------
 *  API
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class API
{
    // ------------------------------------------------------------------------------

    const SERVER = 'https://api.github.com';

    // gists
    // git data
    // github apps
    // interactions
    // issues
    // migrations
    // miscellaneous
    // organizations
    // projects
    // pull requests
    // reactions

    // ------------------------------------------------------------------------------

    //repositories
    const REPOSITORIES =
    [
        // repos root
        'RMRepos'        => 'user/repos',  //
        'RURepos'        => 'users/%s/repos',  //
        'RORepos'        => 'orgs/%s/repos',
        'RRepositories'  => 'repositories',
        'RRRepo'         => 'repos/%s/repo',
        'RRTopics'       => 'repos/%s/%s/topics',
        'RRContributors' => 'repos/%s/%s/contributors',
        'RRLanguages'    => 'repos/%s/%s/languages',
        'RRTeams'        => 'repos/%s/%s/teams',
        'RRTags'         => 'repos/%s/%s/tags',
        'RRDelete'       => 'repos/%s/%s',
        'RRTransfer'     => 'repos/%s/%s/transfer',

        // branches
        'BRBranches'        => 'repos/%s/%s/branches', //
        'BRBBranch'         => 'repos/%s/%s/branches/%s',
        'BRBBProtection'    => 'repos/%s/%s/branches/%s/protection',
        'BRBBPStatus'       => 'repos/%s/%s/branches/%s/protection/required_status_checks',
        'BRBBPSContexts'    => 'repos/%s/%s/branches/%s/protection/required_status_checks/contexts',
        'BRBBPReviews'      => 'repos/%s/%s/branches/%s/protection/required_pull_request_reviews',
        'BRBBPSignatures'   => 'repos/%s/%s/branches/%s/protection/required_signatures',
        'BRBBPAdmins'       => 'repos/%s/%s/branches/%s/protection/enforce_admins',
        'BRBBPRestrictions' => 'repos/%s/%s/branches/%s/protection/restrictions',
        'BRBBPRTeams'       => 'repos/%s/%s/branches/%s/protection/restrictions/teams',
        'BRBBPRUsers'       => 'repos/%s/%s/branches/%s/protection/restrictions/users',

        // collaborators
        'CRCollaborators' => 'repos/%s/%s/collaborators',
        'CRCUser'         => 'repos/%s/%s/collaborators/%s',
        'CRCUPermission'  => 'repos/%s/%s/collaborators/%s/permission',

        // comments
        'CRComments'  => 'repos/%s/%s/comments',
        'CRCComments' => 'repos/%s/%s/commits/%s/comments',
        'CRComment'   => 'repos/%s/%s/commits/%s',

        // commits
        'CRCommits' => 'repos/%s/%s/commits',   //
        'CRCommit'  => 'repos/%s/%s/commits/%s', //
        'CRCompare' => '/repos/%s/%s/compare/%s...%s',

        // commits
        'CRCProfile' => '/repos/%s/%s/community/profile',

        // content
        'CRReadme'        => 'repos/%s/%s/readme',
        'CRContents'      => 'repos/%s/%s/contents/%s', //
        'CRArchiveFormat' => 'repos/%s/%s/%s/%s',

        // deploy keys
        // deployments
        // downloads
        // forks
        // invitations
        // merging
        // pages
        // releases
        // statistics
        // statuses
        // traffic
        // webhooks
    ];

    // search
    // teams
    // scim
    // users

    // ------------------------------------------------------------------------------
}