//
//  UserListView.swift
//  CheckInVN2
//
//  Created by PPPP on 23/01/2023.
//

import SwiftUI

struct UserListView: View {
    @StateObject var userModel = UserViewModel()
    
    var body: some View {
        NavigationView {
            List {
                ForEach(userModel.users, id:\.userID)
                {
                    user in
                    HStack {
                        Text(user.userName)
                        Text(String(user.userPassWord))
                    }
                }
            }
            .navigationTitle("User")
            .onAppear{
                userModel.fetch()
            }
        }
    }
}

struct UserListView_Previews: PreviewProvider {
    static var previews: some View {
        UserListView()
    }
}
